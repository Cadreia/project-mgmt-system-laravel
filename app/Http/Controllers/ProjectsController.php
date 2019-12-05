<?php

namespace App\Http\Controllers;

use App\Project;
use App\Comment;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminProjects = null;
        if(Auth::check() && Auth::user()->role_id == 1 ) {
            $this->adminProjects = Project::all();
        }
        $projects = Auth::user()->projects;
        return view('projects.index', compact('projects', 'adminProjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        $companies = null;
        $companies = Company::where('user_id', Auth::user()->id)->get();
        return view('projects.create', compact('company_id', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'days' => $request['days'],
            'user_id' => auth()->user()->id,
            'company_id' => $request['company_id']
        ]);
        if ($project) {
            return back()->with('success', 'Project added successfully');
        } else {
            return back()->withInput()->with('error', "Project could not be added. Please check your connection and try again later.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $comments = $project->comments;
        $tasks = $project->tasks;
        $tasksCount = $tasks->count();
        $users = $project->users;
        // $comments = Comment::where([
        //     ['commentable_type', 'Project'],
        //     ['commentable_id', $project->id]
        // ])->get();
        return view('projects.show', compact('project', 'tasks', 'tasksCount', 'comments', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validatedRequest = request()->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'days' => ['required']
        ]);
        $projectUpdate = Project::where('id', $project->id)->update([
            'name' => $validatedRequest['name'],
            'description' => $validatedRequest['description'],
            'days' => $validatedRequest['days'],
        ]);
        if ($projectUpdate) {
            return back()->withInput()->with('success', 'Project successfully updated');
        } else {
            return back()->withInput()->with('error', 'Product could not be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Project::where('id', $project->id)->delete();
    }
}
