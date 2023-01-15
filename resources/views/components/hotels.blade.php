@props([
    'id' => 'hotels',
    'name' => 'hotels',
    'placeholder' => 'Search & Select Hotel',
    'multiple' => false,
    'selected' => [],
    'hotels' => collect(),
    'required' => false,
])

@if ($multiple)
    @php
        $name = $name . '[]';
    @endphp
@endif

<div>
    <select onchange="hotelSelected(this.value)" {{ $required ? 'required' : '' }} class="form-select js-select2" name="{{ $name }}"
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
    function hotelSelected(value) {
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

                $('#facilitySelect').html("")

                $('#facilitySelect').append('<option value="">Select Facility</option>')

                $.each(data, function (key, facility) {
                    $('#facilitySelect').append('<option value="' + facility.id + '">' + facility.name + '</option>')
                })
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }
</script>
{{-- @endsection --}}
