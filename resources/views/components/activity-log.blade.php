@props(['column', 'value'])

@php


@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if($condition)
        
    @endif
</a>
