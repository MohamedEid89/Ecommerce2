@extends('layouts.dashboard.dashboard')
@section('title', $category->name)

@section('content')
<div class="card">
	<div class="card-body">
		<div class="card shadow-none border">
			<div class="card-header bg-light d-flex justify-content-between">
				<h5 class="mb-1 mt-1">{{ $category->name }}</h5>
				<div class="col-md-6 float-end">
					<a href="{{ route('dashboard.categories.index') }}" class="btn btn-primary w-22 float-end">
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
						</tr>
					</thead>
					<tbody>
						@foreach ($category->products as $product)
						<td>
							<div class="d-flex align-items-center">
								<div class="recent-product-img">
									<img src="{{ asset('uploads/' . $category->image) }}" alt="{{ $product->name }}" height="50">
								</div>
							</div>
						</td>
						<td>{{ $product->name }}</td>
						<td>{{ $product->store->name }}</td>
						<td>{{ $product->created_at }}</td>
						<td>
							@if ($product->status == 'active')
							<div class="d-flex align-items-center text-success"> <i class='bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1'></i>
								<span>Active</span>
								@else
								<div class="d-flex align-items-center text-danger"> <i class='bx bx-radio-circle bx-rotate-90 align-middle font-18 me-1'></i>
									<span>Archived</span>
								</div>
								@endif
						</td>
			</div>
		</div>
	</div>
</div>
@endsection