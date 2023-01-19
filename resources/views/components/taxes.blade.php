@props([
    'id' => 'taxes',
    'name' => 'taxes',
    'placeholder' => 'Search & Select Tax',
    'multiple' => false,
    'selected' => [],
    'taxes' => collect(),
    'required' => false,
])

@if($multiple)
    @php
        $name = $name . '[]';
    @endphp
@endif

<div>
    <select {{ $required }} id="{{ $id }}" class="form-select js-select2" name="{{ $name }}" {{ $multiple ? "multiple" : "" }}  data-placeholder="{{ $placeholder }}" >

        <option value="">Select Tax</option>

        @foreach ($taxes as $tax)
            <option {{ in_array($tax->id,$selected) ? "selected" : "" }} value="{{ $tax->id }}">
                {{ $tax->name }}
            </option>
        @endforeach

    </select>
</div>
