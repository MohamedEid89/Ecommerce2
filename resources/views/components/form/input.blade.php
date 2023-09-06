@props([
    'type' => 'text',
    'name',
    'value' => '',
    'label' => false,
])
@if ($label)
    <label for="">{{ $label }}</label>
@endif
<input name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $value) }}"
    {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>
@error($name)
    <div class="invalid-feedback">{{ $message }}
    </div>
@enderror
