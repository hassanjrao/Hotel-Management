@props([
    'id' => 'destinations',
    'name' => 'destination',
    'placeholder' => 'Search & Select Destinations',
    'multiple' => false,
    'selected' => '',
    'destinations' => collect(),
])

<div>
    <select required class="form-select js-select2" name="{{ $name }}" {{ $multiple ? "multiple" : "" }}  data-placeholder="{{ $placeholder }}" >


        <option value="">Select Destination</option>

        @foreach ($destinations as $destination)
            <option {{ $destination->id == $selected ? 'selected' : '' }} value="{{ $destination->id }}">
                {{ $destination->name }}
            </option>
        @endforeach

    </select>
</div>
