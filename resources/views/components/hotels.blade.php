@props([
    'id' => 'hotels',
    'name' => 'hotels',
    'placeholder' => 'Search & Select Hotel',
    'multiple' => false,
    'selected' => [],
    'hotels' => collect(),
    'required' => false,
])

@if($multiple)
    @php
        $name = $name . '[]';
    @endphp

@endif

<div>
    <select {{ $required ? "required": "" }} class="form-select js-select2" name="{{ $name }}" {{ $multiple ? "multiple" : "" }}  data-placeholder="{{ $placeholder }}" >

        <option value="">Select Hotel</option>

        @foreach ($hotels as $hotel)
            <option {{ in_array($hotel->id,$selected) ? "selected" : "" }} value="{{ $hotel->id }}">
                {{ $hotel->title }}
            </option>
        @endforeach

    </select>
</div>
