@props([
    'id' => 'home_page',
    'name' => 'home_page',
    'label' => 'Home Page',
    'multiple' => false,
    'checked' => '',
    'required' => false,
])

<div class="form-check">

    <input {{ $required }} class="form-check-input" type="checkbox" {{ $checked }} id="{{ $id }}" name="{{ $name }}">
    <label class="form-check-label" for="{{ $id }}">
        {{ $label }}
    </label>
</div>
