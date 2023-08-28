<div class="row">
    <div class="col-md-6 mb-2">
        <label class="form-label">Category Name</label>
        <input class="form-control" value="{{ $category->name }}" name="name" type="text">
    </div>
    <div class="col-md-6 mb-2">
        <label class="form-label">Category Parent</label>
        <select class="form-select" name="parent_id">
            <option value="">Primary Category</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}" @selected($category->parent_id == $parent->id)>{{ $parent->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Category Description</label>
        <textarea class="form-control" name="description">{{ $category->description }}</textarea>
    </div>
    <div class="col-md-6 mb-2">
        <label class="form-label">Category Image</label>
        <input class="form-control" name="image" type="file" accept="image/*">
        @if ($category->image)
            <div class="product-img">
                <img src="{{ asset('uploads/' . $category->image) }}" height="50">
            </div>
        @endif
        <div class="mb-2 mt-2  d-flex">
            <label class="form-label">Category Status</label>
            <div class="form-check form-check-success mx-3">
                @if ($category->status == '')
                    <input class="form-check-input" type="radio" name="status" value="active" checked>
                    <label class="form-check-label">Active</label>
                @else
                    <input class="form-check-input" type="radio" name="status" value="active"
                        @checked($category->status == 'active')>
                    <label class="form-check-label">Active</label>
                @endif
            </div>

            <div class="form-check form-check-danger checkbox-lg">
                <input class="form-check-input" type="radio" name="status" value="archived"
                    @checked($category->status == 'archived')>
                <label class="form-check-label">Archived</label>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Category Slug</label>
        <input class="form-control" value="{{ $category->slug }}" name="slug" type="text" disabled>

    </div>
    <div class="col-md-6 mb-2">
        <button class="btn btn-primary w-100" type="submit">{{ $button_label ?? 'Save' }}</button>
    </div>
</div>
