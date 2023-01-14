@props([
    'id' => 'hotelStars',
    'name' => 'hotel_star',
    'placeholder' => 'Search & Select Class',
    'multiple' => false,
    'selected' => [1],
    'hotelStars' => collect(),
    'required' => false,
])

<div>
    <select {{ $required }} class="form-select js-select2" name="{{ $name }}" {{ $multiple ? "multiple" : "" }}  data-placeholder="{{ $placeholder }}" >

        <option value="">Select Class</option>

        @foreach ($hotelStars as $hotelStar)
            <option {{ in_array($hotelStar->id,$selected) ? "selected" : "" }} value="{{ $hotelStar->id }}">
                {{ $hotelStar->name }}
            </option>
        @endforeach

    </select>
</div>
