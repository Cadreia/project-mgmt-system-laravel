@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">List of Companies</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex align-items-baseline justify-content-end">
                            <a href="companies/create" class="btn btn-success mb-2">Add New</a>
                        </div>
                    </div>
                    <div class="list-group">
                            @if ($adminCompanies == null)
                            @foreach ($companies as $company)
                            <a href="/companies/{{ $company->id }}" class="list-group-item">
                                {{ $company->name }}
                            </a>
                            @endforeach
                        @else
                            @foreach ($adminCompanies as $company)
                            <a href="/companies/{{ $company->id }}" class="list-group-item">
                                {{ $company->name }}
                            </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
