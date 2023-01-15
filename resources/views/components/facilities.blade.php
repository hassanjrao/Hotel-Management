@props([
    'id' => 'facilities',
    'name' => 'facilities',
    'placeholder' => 'Search & Select Facilities',
    'multiple' => false,
    'selected' => [],
    'facilities' => collect(),
    'required' => false,
])

@if($multiple)
    @php
        $name = $name . '[]';
    @endphp
@endif

<div>
    <select {{ $required }} id="facilitySelect" class="form-select js-select2" name="{{ $name }}" {{ $multiple ? "multiple" : "" }}  data-placeholder="{{ $placeholder }}" >

        @foreach ($facilities as $facility)
            <option {{ in_array($facility->id,$selected) ? "selected" : "" }} value="{{ $facility->id }}">
                {{ $facility->name }}
            </option>
        @endforeach

    </select>
</div>
