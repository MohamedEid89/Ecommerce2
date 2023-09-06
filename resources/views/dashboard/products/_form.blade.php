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
        <x-form.input label="Product Name" name="name" type="text" :value="$product->name" />
    </div>
    <div class="col-md-6 mb-2">
        <label class="form-label">Categories</label>
        <select class="form-select" name="parent_id">
            <option value="">Primary Category</option>
            @foreach (App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Product Description</label>
        <x-form.textarea name="description" :value="$product->description" />
    </div>
    <div class="col-md-3">
        <label class="form-label">Price</label>
        <x-form.input name="price" :value="$product->price" />
    </div>
    <div class="col-md-3">
        <label class="form-label">Compare price</label>
        <x-form.input name="compare_price" :value="$product->compare_price" />
    </div>
    <div class="col-md-6">
        <label class="form-label">Tags</label>
        <x-form.input name="tags" :value="$tags" />
    </div>
    <div class="col-md-6 mb-2">
        <x-form.label id="image">Product Image</x-form.label>
        <x-form.input name="image" type="file" accept="image/*" />
        @if ($product->image)
            <div class="product-img">
                <img src="{{ asset('uploads/' . $product->image) }}" height="50">
            </div>
        @endif
        <div class="mb-2 mt-2  d-flex">
            <label class="form-label">Product Status</label>
            <x-form.radio name="status" checked="{{ $product->status ?? 'active' }}" :options="['active' => 'Active', 'draft' => 'Draft', 'archived' => 'Archived']" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-2">
        <button class="btn btn-primary w-100" type="submit">{{ $button_label ?? 'Save' }}</button>
    </div>
</div>
<script>
    var inputElm = document.querySelector('[name=tags]'),
        tagify = new Tagify(inputElm);
</script>
