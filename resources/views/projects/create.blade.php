@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pt-3 text-center">
                    <h4>Create Project</h4>
                    {{-- <div>Please tell us about your project</div> --}}
                </div>

                <div class="card-body">
                <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if ($company_id != null)
                            <input type="hidden" class="form-control" name="company_id" value="{{ $company_id }}">
                        @else
                            <div class="form-group row">
                                <label for="company_id" class="col-md-4 col-form-label text-md-right">Company</label>

                                    <div class="col-md-6">
                                    <select id="company_id" type="text" class="form-control @error('company_id') is-invalid @enderror" name="company_id" required autocomplete="company_id" autofocus>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('company_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        @endif

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus rows="5"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="days" class="col-md-4 col-form-label text-md-right">Days</label>

                            <div class="col-md-6">
                            <input id="days" type="number" value="1" min="1" class="form-control @error('days') is-invalid @enderror" name="days" value="{{ old('days') }}" required autocomplete="days" autofocus />

                                @error('days')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
