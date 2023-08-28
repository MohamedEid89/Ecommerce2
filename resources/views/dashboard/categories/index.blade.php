@extends('layouts.dashboard.dashboard')
@section('title', 'Categories')
@section('content')


    <div class="card">
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if (session()->has('info'))
                <div class="alert alert-info">
                    <span>{{ session('info') }}</span>
                </div>
            @endif
            @if (session()->has('warning'))
                <div class="alert alert-warning">
                    <span>{{ session('warning') }}</span>
                </div>
            @endif
            <div class="card shadow-none border">
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-1 mt-1">Categories</h5>
                    <div class="col-md-6 float-end">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary float-end">Create
                            Category</a>
                    </div>
                </div>

                <div class="table-responsive py-3 px-1">
                    <table id="example2" class="table table-striped ">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Parent</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <td>{{ $category->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                            <img src="{{ asset('uploads/' . $category->image) }}"
                                                alt="{{ $category->name }}" height="50">
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->parent_id }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    @if ($category->status == 'active')
                                        <div class="d-flex align-items-center text-success"> <i
                                                class='bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1'></i>
                                            <span>Active</span>
                                        @else
                                            <div class="d-flex align-items-center text-danger"> <i
                                                    class='bx bx-radio-circle bx-rotate-90 align-middle font-18 me-1'></i>
                                                <span>Archived</span>
                                    @endif
                </div>
                </td>
                <td>
                    <div class="d-flex order-actions">

                        <a href="{{ route('categories.edit', $category->id) }}">
                            <button class="btn btn-sm btn-warning bx bxs-edit type="submit"
                                class="btn btn-sm btn-danger bx bxs-trash"></button>
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a><button type="submit" class="btn btn-sm btn-danger bx bxs-trash"></button></a>
                        </form>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
