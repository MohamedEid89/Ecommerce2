@extends('layouts.dashboard.dashboard')
@section('title', 'Trashed Categories')
@section('content')


    <div class="card">
        <div class="card-body">
            <x-alert type="success" />
            <x-alert type="info" />
            <x-alert type="warning" />
            <div class="card shadow-none border">
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-1 mt-1">Trashed Categories</h5>
                    <div class="col-md-6 float-end">
                        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-primary float-end">
                            Back</a>
                    </div>
                </div>

                <div class="table-responsive py-3 px-1">
                    <table id="example2" class="table table-striped ">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Deleted At</th>
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
                                <td>{{ $category->deleted_at }}</td>
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
                        <form action="{{ route('dashboard.categories.restore', $category->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <a><button type="submit" class="btn btn-sm btn-success bx bxs-share"></button></a>
                        </form>
                        <form action="{{ route('dashboard.categories.force-delete', $category->id) }}" method="POST">
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
