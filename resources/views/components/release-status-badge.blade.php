@props([
    'code' => 'published',
    'label' => 'Release Status',
])


<div>
    @if ($code == 'published')
        @php
            $color = 'bg-success';
        @endphp
    @elseif($code == 'not_published')
        @php
            $color = 'bg-danger';
        @endphp
    @elseif($code == 'awaiting')
        @php
            $color = 'bg-warning';
        @endphp
    @elseif($code == 'archived')
        @php
            $color = 'bg-secondary';
        @endphp
    @endif

    <span class="badge {{ $color }}">{{ $label }}</span>
</div>
