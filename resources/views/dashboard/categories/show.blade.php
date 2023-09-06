@extends('layouts.dashboard.dashboard')
@section('title', $category->name)
@section('content')


    <div class="card">
        <div class="card-body">
            <x-alert type="success" />
            <x-alert type="info" />
            <x-alert type="warning" />
            <div class="card shadow-none border">
                <div class="card-header align-middle bg-light d-flex justify-content-between">
                    <h5 class="mt-2">{{ $category->name }}</h5>
                    <div class="col-md-6  float-end">
                        {{-- <a href="{{ route('dashboard.products.trash') }}" 
                        class="btn btn btn-outline-danger float-end mx-2 bx bxs-trash"></a> --}}
                        <a href="{{ route('dashboard.categories.index') }}" class="btn btn btn-primary float-end">
                            Back</a>
                    </div>
                </div>

                <div class="table-responsive py-3 px-1">
                    <table id="example2" class="table table-striped ">
                        <thead class="table-light">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Store</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->products()->with('store')->latest()->paginate(99999) as $product)
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                            <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}"
                                                height="50">
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->store->name }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    @if ($product->status == 'active')
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

                        <a href="{{ route('dashboard.products.edit', $product->id) }}">
                            <button class="btn btn-sm btn-warning bx bxs-edit type="submit"
                                class="btn btn-sm btn-danger bx bxs-trash"></button>
                        </a>
                        <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST">
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
