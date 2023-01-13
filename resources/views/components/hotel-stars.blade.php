@props([
    'id' => 'hotelStars',
    'name' => 'hotel_star',
    'placeholder' => 'Search & Select Class',
    'multiple' => false,
    'selected' => '',
    'hotelStars' => collect(),
])

<div>
    <select required class="form-select js-select2" name="{{ $name }}" {{ $multiple ? "multiple" : "" }}  data-placeholder="{{ $placeholder }}" >

        <option value="">Select Class</option>

        @foreach ($hotelStars as $hotelStar)
            <option {{ $hotelStar->id == $selected ? 'selected' : '' }} value="{{ $hotelStar->id }}">
                {{ $hotelStar->name }}
            </option>
        @endforeach

    </select>
</div>
