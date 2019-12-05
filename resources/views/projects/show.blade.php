@extends('layouts.app')

@section('content')
<main class="d-flex">
    <div class="toggled col-md-3" id="wrapper">
        <div class="bg-light border-right py-3" id="sidebar-wrapper">
            <div class="sidebar-heading text-uppercase text-center"><h5>Actions</h5></div>
                <div class="list-group list-group-flush">
                    <a href="/projects/{{ $project->id }}/edit" class="list-group-item list-group-item-action bg-light"><span class="fas fa-edit blue"></span> Edit</a>
                    <a href="/projects" class="list-group-item list-group-item-action bg-light"><span class="fas fa-briefcase blue"></span> All Projects</a>
                    <a href="/tasks/create/{{ $project->id }}" class="list-group-item list-group-item-action bg-light"><span class="fas fa-tasks blue"></span> Add Task</a><br>
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
                </div><br>

            <div class="px-2">
                <h5 class="sidebar-heading text-uppercase text-center">Add Member</h5>
                <input type="text" class="form-control mb-2" placeholder="Enter email">
                <button type="submit" class="btn btn-primary btn-sm btn-block">Invite</button>
            </div><br>
        </div>

        <form id="delete-form" method="POST" action="{{ route('projects.destroy', [$project->id]) }}" style="display: none;">
            @method('DELETE')
            @csrf
        </form>
    </div>


    <div class="col-md-9">
        <div class="well">
        <!-- Hide the sidebar menu
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
        -->
            <div class="row">
                <div class="col-md-8 offset-2">
                    <h1 class="display-4 justify-content-center">{{ $project->name }}</h1>
                    <p>{{ $project->body}}</p>
                    <p>Days: {{ $project->days}}</p>
                    <p>
                        <a class="btn btn-outline-primary mx-auto" href="#" role="button">Learn more »</a>
                    </p>
                </div>
            </div>
        </div><br>

    <!-- Tabs -->
        <div class="classic-tabs mx-2">
            <ul class="nav nav-tabs tabs-orange" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="members-tab" data-toggle="tab" href="#members" role="tab" aria-controls="members"
                    aria-selected="true"><i class="fas fa-user"></i> Members</a>
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
                <div class="tab-pane fade show active" id="members" role="tabpanel" aria-labelledby="members-tab">
                    @include('projects.tabs.members')
                </div>
                <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                    @include('projects.tabs.tasks')
                </div>
                <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                    @include('projects.tabs.comments')
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
