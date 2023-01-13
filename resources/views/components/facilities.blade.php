@props([
    'id' => 'facilities',
    'name' => 'facility',
    'placeholder' => 'Search & Select Facilities',
    'multiple' => false,
    'selected' => '',
    'facilities' => collect(),
])

<div>
    <select required class="form-select js-select2" name="{{ $name }}" {{ $multiple ? "multiple" : "" }}  data-placeholder="{{ $placeholder }}" >

        @foreach ($facilities as $facility)
            <option {{ $facility->id == $selected ? 'selected' : '' }} value="{{ $facility->id }}">
                {{ $facility->name }}
            </option>
        @endforeach

    </select>
</div>
