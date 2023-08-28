@extends('layouts.dashboard.dashboard')
@section('title', 'Edit Category')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card shadow-none border">
                <div class="card-header bg-light">
                    <h6 class="mb-1 mt-1">Edit Category</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $category->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('dashboard.categories._form', [
                            'button_label' => 'Update',
                        ])

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
