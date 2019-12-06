<?php

namespace App\Http\Controllers;

use App\Company;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminCompanies = null;
        if (Auth::check() && Auth::user()->role_id == 1) {
            $adminCompanies = Company::all();
        }
        //$companies = auth()->user()->companies;
        $companies = Auth::user()->companies;
        return view('companies.index', compact('companies', 'adminCompanies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('companies.create');
        } else {
            return back()->withInput()->with('error', 'You need to be logged in to add a company.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $company = Company::create([
                'name' => $request->input('name'),
                'mission_statement' => $request->input('mission_statement'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);
            if ($company) {
                return redirect()->route('companies.index')->with('success', 'Company successfully created');
            } else {
                return back()->withInput()->with('error', 'Company not created.');
            }
        } else {
            return redirect('/login')->with('error', 'Company not created. You need to be logged in first');
        }

        //ALTERNATIVE METHOD
        // $validatedRequest = request()->validate([
        //     'name' => ['required', 'max:255'],
        //     'mission_statement' => '',
        //     'description' => ''
        // ]);
        // auth()->user()->companies()->create([
        //     'name' => $validatedRequest['name'],
        //     'mission_statement' => $validatedRequest['mission_statement'],
        //     'description' => $validatedRequest['description'],
        // ]);
        // return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //$company = Company::where('id', $company->id)->first();
        $projects = $company->projects;
        $projectsCount = $projects->count();
        return view('companies.show', compact('company', 'projects', 'projectsCount'));
        //dd($projects);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validatedRequest = request()->validate([
            'name' => ['required', 'max:255'],
            'mission_statement' => '',
            'description' => ''
        ]);
        $companyUpdate = Company::where('id', $company->id)->update([
            //'name' => $request->input('name'),
            'name' => $validatedRequest['name'],
            'mission_statement' => $validatedRequest['mission_statement'],
            'description' => $validatedRequest['description'],
        ]);
        if ($companyUpdate) {
            //return redirect()->route('companies.show', ['company' => $company->id])->with('success', 'You have successfully updated the company details');
            return redirect('/companies/' . $company->id)->with('success', 'Company updated successfully');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company = Company::find($company->id);
        if ($company->delete()) {
            return redirect('/companies')->with('success', 'Company deleted successfully');
        }
        return back()->withInput()->with('error', 'Company could not be deleted');
    }

    public function more()
    {
        return view('companies.more');
    }
}
