@extends('layouts.app')

@section('content')
<h1>Project goes here!!!</h1>
<main class="d-flex">
<div class="toggled col-md-2" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-uppercase text-center">Actions</div>
        <div class="list-group list-group-flush">
            <a href="/projects/{{ $project->id }}/edit" class="list-group-item list-group-item-action bg-light">Edit</a>
            <a href="/projects" class="list-group-item list-group-item-action bg-light">All Projects</a>
            <a href="/projects/create" class="list-group-item list-group-item-action bg-light">Add Project</a>
            <a href="/tasks/create" class="list-group-item list-group-item-action bg-light">Add Task</a><br>

            <a
                onclick="
                    var result = confirm('Are you sure you want to delete this project?');
                    if(result) {
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }
                "
                href=""
                class="list-group-item list-group-item-action bg-light">
                Delete
            </a>
        </div>
    </div>

    <form id="delete-form" method="POST" action="{{ route('projects.destroy', [$project->id]) }}" style="display: none;">
        @method('DELETE')
        @csrf
    </form>
</div>


    <div class="col-md-10 ">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
        <!-- Hide the sidebar menu
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
        -->
              <div class="row">
                  <div class="col-md-8 offset-2">
                        <h1 class="display-3 justify-content-center">{{ $project->name }}</h1>
                        <p>{{ $project->description}}</p>
                        <p>Days: {{ $project->days}}</p>
                        <p><a class="btn btn-primary mx-auto" href="#" role="button">Learn more »</a></p>
                  </div>
              </div>
        </div>

        <div class="container">
          <!-- Example row of columns -->
          @if ($tasksCount >= 1)
            <div class="col-md-6 mx-auto">
                <h2 class="text-center">Tasks</h2><hr>
            </div>
        @else
                <h4 class="text-center mt-4 mb-3">There are no tasks for this project.</h4>
                <div class="d-flex justify-content-center">
                <a class="btn btn-primary" href="">Add one</a>
            </div>
          @endif
          <div class="row">
            @foreach ($tasks as $task)
                <div class="col-md-4">
                    <h3>{{ $task->name }}</h3>
                    <p>{{ $task->description }}</p>
                    <p>Days: {{ $task->days }}</p>
                    <p>Hours: {{ $task->hours }}</p>
                    <p><a class="btn btn-secondary" href="/tasks/{{ $task->id }}" role="button">View details »</a></p>
                </div>
            @endforeach

          </div>

        </div> <!-- /container -->
    </div>
</main>
@endsection
