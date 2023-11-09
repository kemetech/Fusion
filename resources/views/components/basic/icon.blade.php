@props(['icon' => 'user', 'size' => 'default', 'solid' => false])
@php
    $sizeClass = [
        'tiny' => 'w-3 h-3',
        'default' => 'w-4 h-4 ',
        'md' => 'w-5 h-5 ',
        'lg' => 'w-6 h-6',
    ];
    if ($solid) {
        $fill = 'currentColor';
    } else {
        $fill = 'none';
    }
@endphp
<x-dynamic-component component="fusion::basic.icons.{{ $icon }}"  {{$attributes->merge([
    'class' => $sizeClass[$size],
    'stroke-width' => '1.5',
    'fill' => $fill,

])}} />
