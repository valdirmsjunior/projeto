@props([
    'for' => '',
    'class' => '',
    'name' => '',
    'required' => false
])

<label for="{{ $for }}" class="{{ $class }}">
    @if ($required)
    <span class="text-danger">*</span>
    @endif
    {{ $name }}
</label>
