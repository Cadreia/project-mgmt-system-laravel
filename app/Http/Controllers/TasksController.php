<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public $project_T_id = null;
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminTasks = null;
        if (Auth::check() && Auth::user()->role_id == 1) {
            $adminTasks = Task::all();
        }
        $tasks = Auth::user()->tasks;
        return view('tasks.index', compact('tasks', 'adminTasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id = null)
    {
        $this->project_T_id = $project_id;
        return view('tasks.create', compact('project_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'days' => $request['days'],
            'hours' => $request['hours'],
            'user_id' => auth()->user()->id,
            'project_id' => $request['project_id'],
            'company_id' => Project::where('id', $this->project_T_id)->get('company_id')->company_id
        ]);

        if ($task) {
            return back()->withInput()->with('success', 'Project added successfully');
        } else {
            return back()->withInput()->with('error', "Failed to add project. Please check your connection and try again later.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
