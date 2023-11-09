@props(['width' => 'w-48', 'heading' => null, 'align' => 'top', 'level' => null])
@php

$alignmentClasses = [
    'left' => 'origin-top-left left-0',
    'top' => 'origin-top',
    'right' => 'origin-top-right right-0',
    'bottom' => 'origin-bottom top-full -translate-y-full'
];

$groupMenu = [
    '1' => 'group-hover/1:mr-0 group-hover/1:visible group-hover/1:opacity-100',
    '2' => 'group-hover/2:mr-0 group-hover/2:visible group-hover/2:opacity-100',
    '3' => 'group-hover/3:mr-0 group-hover/3:visible group-hover/3:opacity-100',
    '4' => 'group-hover/4:mr-0 group-hover/4:visible group-hover/4:opacity-100',
    '5' => 'group-hover/5:mr-0 group-hover/5:visible group-hover/5:opacity-100'
];

$classes ="absolute top-0 right-0 invisible mr-1 duration-200 ease-out translate-x-full opacity-0 bg-white text-secondary-600   z-50 mt-1  $width  shadow-lg rounded border border-secondary-200/70 p-1  text-sm   $alignmentClasses[$align]";

if($level){
    $classes ="absolute top-0 right-0 invisible mr-1 duration-200 ease-out translate-x-full opacity-0 bg-white text-secondary-600   z-50 mt-1  $width  shadow-lg rounded border border-secondary-200/70 p-1  text-sm   $alignmentClasses[$align] $groupMenu[$level]";
} 
@endphp

<div  {{$attributes->class([$classes])}}>
    @if ($heading)
        <div class="pt-2 pb-1 font-semibold  text-xs px-1 ">{{$heading}}
        </div>
    @endif          
    {{ $slot }}
</div>