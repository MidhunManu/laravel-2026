@props([
    'href',
    'disabled' => false
])

@php
    $style = "
        color: #333;
        text-decoration: none;
        padding: 4px 0;
        display: block;
    ";

    $disabledStyle = "
        color: #aaa;
        pointer-events: none;
    ";
@endphp

<a href="{{ $disabled ? '#' : $href }}"
   style="{{ $style }} {{ $disabled ? $disabledStyle : '' }}">
    {{ $slot }}
</a>