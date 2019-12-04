@extends('layouts.app')

@section('content')
<main class="d-flex">
<div class="toggled col-md-2" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-uppercase text-center">Actions</div>
        <div class="list-group list-group-flush">
            <a href="/companies/{{ $company->id }}/edit" class="list-group-item list-group-item-action bg-light">Edit</a>
            <a href="/companies" class="list-group-item list-group-item-action bg-light">All Companies</a>
            <a href="/companies/create" class="list-group-item list-group-item-action bg-light">Add Company</a>
            <a href="/projects/create/{{ $company->id }}" class="list-group-item list-group-item-action bg-light">Add Project</a><br>

            <a
                onclick="
                    var result = confirm('Are you sure you want to delete this company?');
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

    <form id="delete-form" method="POST" action="{{ route('companies.destroy', [$company->id]) }}" style="display: none;">
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
                        <h1 class="display-3 justify-content-center">{{ $company->name }}</h1>
                        <p>{{ $company->mission_statement}}</p>
                  <p><a class="btn btn-primary mx-auto" href="/companies/{{ $company->id }}/more" role="button">Learn more »</a></p>
                  </div>
              </div>
        </div>

        <div class="container">
          <!-- Example row of columns -->
          @if ($projectsCount >= 1)
            <div class="col-md-6 mx-auto">
                <h2 class="text-center">Projects</h2><hr>
            </div>
        @else
                <h4 class="text-center mt-4 mb-3">There are no projects for this company.</h4>
                <div class="d-flex justify-content-center">
                <a class="btn btn-primary" href="/projects/create/{{ $company->id }}">Add one</a>
            </div>
          @endif
          <div class="row">
            @foreach ($projects as $project)
                <div class="col-md-4">
                    <h3>{{ $project->name }}</h3>
                    <p>{{ $project->description }}</p>
                <p><a class="btn btn-secondary btn-sm" href="/projects/{{ $project->id }}" role="button">View details »</a></p>
                </div>
            @endforeach

          </div>

        </div> <!-- /container -->
    </div>
</main>
@endsection
