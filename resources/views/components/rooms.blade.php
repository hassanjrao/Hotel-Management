@props([
    'id' => 'rooms',
    'name' => 'rooms',
    'placeholder' => 'Search & Select Room',
    'multiple' => false,
    'selected' => [],
    'rooms' => collect(),
    'required' => false,
])

@if ($multiple)
    @php
        $name = $name . '[]';
    @endphp
@endif

<div>
    <select class="form-select js-select2" name="{{ $name }}" id="{{ $id }}"
        {{ $multiple ? 'multiple' : '' }} data-placeholder="{{ $placeholder }}">

        <option value="">Select Room</option>

        @foreach ($rooms as $room)
            <option {{ in_array($room->id, $selected) ? 'selected' : '' }} value="{{ $room->id }}">
                {{ $room->title }}
            </option>
        @endforeach

    </select>

</div>

