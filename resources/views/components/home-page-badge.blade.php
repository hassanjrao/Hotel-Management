
@props([
    'home_page' => 0
])

<div>
    <i class="fa fa-home {{ $home_page == 1 ? 'text-success' : '' }}"></i>
</div>
