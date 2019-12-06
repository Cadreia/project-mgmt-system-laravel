@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pt-3 text-center">
                    <h4>Add Role</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 d-flex justify-content-end">
                            <div class="col-md-8 float-right">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                            <div class="col-md-8 offset-md-4">
                                <a class="btn btn-secondary btn-sm" href="{{ URL::previous() }}"><span class="fas fa-backward"> Go back</span></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
