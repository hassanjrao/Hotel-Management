@props([
    'id' => 'hotels',
    'name' => 'hotels',
    'placeholder' => 'Search & Select Hotel',
    'multiple' => false,
    'selected' => [],
    'hotels' => collect(),
    'required' => false,
    'onchange' => 'hotelFacilities',
    'hotelDependentId' => 'facilitySelect',
])

@if ($multiple)
    @php
        $name = $name . '[]';
    @endphp
@endif

<div>
    <select onchange="{{ $onchange }}(this.value)" {{ $required ? 'required' : '' }} class="form-select js-select2" name="{{ $name }}"
        {{ $multiple ? 'multiple' : '' }} data-placeholder="{{ $placeholder }}">

        <option value="">Select Hotel</option>

        @foreach ($hotels as $hotel)
            <option {{ in_array($hotel->id, $selected) ? 'selected' : '' }} value="{{ $hotel->id }}">
                {{ $hotel->title }}
            </option>
        @endforeach

    </select>

</div>


{{-- @section('js_after') --}}
<script>
    function hotelFacilities(value) {
        let hotel_id=value

        // get hotel facilties

        $.ajax({
            url: "{{ route('cpanel.hotels.facilities') }}",
            type: "GET",
            data: {
                hotel_id: hotel_id,
            },
            success: function (data) {
                console.log(data)
                // $('#hotel_facilities').html(data)

                $('#{{ $hotelDependentId }}').html("")

                $('#{{ $hotelDependentId }}').append('<option value="">Select Facility</option>')

                $.each(data, function (key, facility) {
                    $('#{{ $hotelDependentId }}').append('<option value="' + facility.id + '">' + facility.name + '</option>')
                })
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }


    function hotelRooms(value) {
        let hotel_id=value

        // get hotel facilties

        $.ajax({
            url: "{{ route('cpanel.hotels.rooms') }}",
            type: "GET",
            data: {
                hotel_id: hotel_id,
            },
            success: function (data) {
                console.log("rooms",data,("#{{ $hotelDependentId }}"))
                // $('#hotel_facilities').html(data)

                $("#{{ $hotelDependentId }}").html("")

                $("#{{ $hotelDependentId }}").append('<option value="">Select Room</option>')

                $.each(data, function (key, room) {
                    $('#{{ $hotelDependentId }}').append('<option value="' + room.id + '">' + room.title + '</option>')
                })
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }

</script>
{{-- @endsection --}}
