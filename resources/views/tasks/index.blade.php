@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary bg-primary text-white">
                <div class="card-header">List of Taks</div>

                <div class="card-body">
                    <div class="list-group">
                        @foreach ($tasks as $task)
                            <a href="/tasks/{{ $task->id }}" class="list-group-item">
                                {{ $task->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
