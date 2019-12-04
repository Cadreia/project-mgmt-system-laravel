@extends('layouts.app')

@section('content')
<main class="d-flex">
<div class="toggled col-md-2" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-uppercase text-center">Actions</div>
        <div class="list-group list-group-flush">
            <a href="/projects/{{ $project->id }}/edit" class="list-group-item list-group-item-action bg-light">Edit</a>
            <a href="/projects" class="list-group-item list-group-item-action bg-light">All Projects</a>
            <a href="/tasks/create/{{ $project->id }}" class="list-group-item list-group-item-action bg-light">Add Task</a><br>
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
        <div class="well">
        <!-- Hide the sidebar menu
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
        -->
              <div class="row">
                  <div class="col-md-8 offset-2">
                        <h1 class="display-4 justify-content-center">{{ $project->name }}</h1>
                        <p>{{ $project->body}}</p>
                        <p>Days: {{ $project->days}}</p>
                        <p><a class="btn btn-outline-primary mx-auto" href="#" role="button">Learn more »</a></p>
                  </div>
              </div>
        </div>
<br>

<!-- Tabs -->
<div class="classic-tabs mx-2">
        <ul class="nav nav-tabs tabs-orange" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users"
                    aria-selected="true"><i class="fa fa-user"></i> Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="tasks-tab" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks"
                    aria-selected="false"><i class="fa fa-pen-o"></i>Tasks</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments"
                    aria-selected="false"><i class="fa fa-chat"></i>Comments</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">Raw denim you
                  probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master
                  cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro
                  keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip
                  placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi
                  qui.</div>
                <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                    @if ($tasksCount >= 1)
                    <div class="col-md-6 mx-auto">
                        <h2 class="text-center">Tasks</h2><hr>
                    </div>
                @else
                        <h4 class="text-center mt-4 mb-3">There are no tasks for this project.</h4>
                        <div class="d-flex justify-content-center">
                        <a class="btn btn-primary" href="{{ route('tasks.create', [$project->id]) }}">Add one</a>
                    </div>
                    <hr>
                  @endif

                  <!-- List of Tasks -->
                  <div class="row">
                    @foreach ($tasks as $task)
                        <div class="col-md-4">
                            <h3>{{ $task->name }}</h3>
                            <p>{{ $task->description }}</p>
                            <p>Days: {{ $task->days }}</p>
                            <p>Hours: {{ $task->hours }}</p>
                            <p><a class="btn btn-secondary btn-sm" href="/tasks/{{ $task->id }}" role="button">View details »</a></p>
                        </div>
                    @endforeach

                  </div>
                </div>


<div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
@include('projects.tabs.comment')
</div>
</div>

</div>

</div>
</main>
@endsection
