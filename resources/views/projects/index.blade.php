@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary bg-primary text-white">
                <div class="card-header">List of Projects</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-baseline justify-content-end">
                            <a href="projects/create" class="btn btn-success mb-2">Add New</a>
                        </div>
                    </div>
                    <div class="list-group">
                        @foreach ($projects as $project)
                            <a href="/projects/{{ $project->id }}" class="list-group-item">
                                {{ $project->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
