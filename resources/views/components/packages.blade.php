@props([
    'id' => 'packages',
    'name' => 'packages',
    'placeholder' => 'Search & Select Package',
    'multiple' => false,
    'selected' => [],
    'packages' => collect(),
    'required' => false,
])

@if($multiple)
    @php
        $name = $name . '[]';
    @endphp
@endif

<div>
    <select  {{ $required ? 'required' : '' }} id="{{ $id }}" class="form-select js-select2" name="{{ $name }}" {{ $multiple ? "multiple" : "" }}  data-placeholder="{{ $placeholder }}" >

        <option value="">Select Package</option>

        @foreach ($packages as $package)
            <option {{ in_array($package->id,$selected) ? "selected" : "" }} value="{{ $package->id }}">
                {{ $package->name }}
            </option>
        @endforeach

    </select>
</div>
