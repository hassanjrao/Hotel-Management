@props([
    'id' => 'users',
    'name' => 'users',
    'placeholder' => 'Search & Select users',
    'multiple' => false,
    'selected' => [],
    'users' => collect(),
    'required' => false,
    'disabled' => false,
])

@if($multiple)
    @php
        $name = $name . '[]';
    @endphp

@endif

<div>
    <select {{ $required ? "required": "" }} {{ $disabled ? 'disabled' : '' }} class="form-select js-select2" name="{{ $name }}" {{ $multiple ? "multiple" : "" }}  data-placeholder="{{ $placeholder }}" >

        @foreach ($users as $user)
            <option {{ in_array($user->id,$selected) ? "selected" : "" }} value="{{ $user->id }}">
                {{ $user->name }}
            </option>
        @endforeach

    </select>
</div>
