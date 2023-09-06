@if (session()->has($type))
    <div class="alert alert-{{ $type }}">
        <span>{{ session($type) }}</span>
    </div>
@endif
