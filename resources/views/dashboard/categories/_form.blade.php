@if ($errors->any())
    <div class="alert alert-warning">
        <span>Error Occured!</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6 mb-2">
        <x-form.input label="Category Name" name="name" type="text" :value="$category->name" />
    </div>
    <div class="col-md-6 mb-2">
        <label class="form-label">Category Parent</label>
        <select class="form-select" name="parent_id">
            <option value="">Primary Category</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}" @selected(old('parent_id', $category->parent_id) == $parent->id)>{{ $parent->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Category Description</label>
        <x-form.textarea name="description" :value="$category->description" />
    </div>
    <div class="col-md-6 mb-2">
        <x-form.label id="image">Category Image</x-form.label>
        <x-form.input name="image" type="file" accept="image/*" />
        @if ($category->image)
            <div class="product-img">
                <img src="{{ asset('uploads/' . $category->image) }}" height="50">
            </div>
        @endif
        <div class="mb-2 mt-2  d-flex">
            <label class="form-label">Category Status</label>
            <x-form.radio name="status" checked="{{ $category->status ?? 'active' }}" :options="['active' => 'Active', 'archived' => 'Archived']" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-2">
        <button class="btn btn-primary w-100" type="submit">{{ $button_label ?? 'Save' }}</button>
    </div>
</div>
