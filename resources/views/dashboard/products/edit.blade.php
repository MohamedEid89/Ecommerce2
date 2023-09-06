@extends('layouts.dashboard.dashboard')
@section('title', 'Edit Product')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card shadow-none border">
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-1 mt-1">Edit Product</h5>
                    <div class="col-md-6 float-end">
                        <a href="{{ route('dashboard.products.index') }}" class="btn btn-primary w-22 float-end">
                            Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.products.update', $product->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('dashboard.products._form', [
                            'button_label' => 'Update',
                        ])

                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
