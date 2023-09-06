@extends('layouts.dashboard.dashboard')
@section('title', 'Create Category')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card shadow-none border">
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-1 mt-1">Creat Category</h5>
                    <div class="col-md-6 float-end">
                        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-primary w-22 float-end">
                            Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('dashboard.categories._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
