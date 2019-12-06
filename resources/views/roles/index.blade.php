@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">All Roles</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-baseline justify-content-end">
                            <a href="{{ route('roles.create') }}" class="btn btn-success mb-2 btn-sm"><span class="fas fa-plus-circle"> Add New</span></a>
                        </div>
                    </div>
                    <div class="list-group">
                        @foreach ($roles as $role)
                                <a class="list-group-item" href="">{{ $role->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
