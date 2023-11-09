@props(['type' => 'view', 'route' => null])
<x-dynamic-component component="grid::actions.{{ $type }}"  route={{$route}}  {{ $attributes }} />
