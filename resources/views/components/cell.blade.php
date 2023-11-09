@props(['type' => 'text', 'item' => null])
<x-dynamic-component component="grid::cells.{{ $type }}" item="{{$item}}" {{ $attributes }} />
