@props(['icon' => null, 'iconSize' => 'default', 'solidIcon' => false, 'iconStroke' => '1.5', 'link' => null, 'href' => null, 'level' => null ])
@php
$groupItem = [
        '1' => 'group/1',
        '2' => 'group/2',
        '3' => 'group/3',
        '4' => 'group/4',
        '5' => 'group/5'
    ];
$classes ="flex relative items-center p-2  rounded  cursor-pointer  gap-2 hover:bg-neutral-100";

if($level){
        $classes ="flex relative items-center p-2  rounded  cursor-pointer  gap-2 hover:bg-neutral-100 $groupItem[$level]";
    } 
@endphp

<div {{$attributes->class([$classes])}} >
    @if ($icon)
        <x-fusion-icon :icon=$icon :solid=$solidIcon stroke-width={{$iconStroke}} :size=$iconSize />
    @endif
    @if ($link)
        <a href={{$href}} >{{ $link }}</a> 
    @endif
    @if ($level)
        <x-fusion-icon icon="chevron-right" class="ml-auto"/>
    @endif
    {{$slot}}
</div>
