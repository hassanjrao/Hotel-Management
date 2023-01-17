@props([
    'id' => 'days',
    'name' => 'days',
    'placeholder' => 'Search & Select days',
    'multiple' => false,
    'selected' => [],
    'required' => false,
    'days'=>[],
])

@if ($multiple)
    @php
        $name = $name . '[]';
    @endphp
@endif

<div>
    <select {{ $required }} class="form-select js-select2" name="{{ $name }}"
        {{ $multiple ? 'multiple' : '' }} data-placeholder="{{ $placeholder }}">


        <option value="">Select Days</option>

        @foreach ($days as $ind=> $day)
            <option {{ in_array($day['code'], $selected) ? 'selected' : '' }} value="{{ $day['code'] }}">
                {{ $day['name'] }}
            </option>
        @endforeach

    </select>
</div>
