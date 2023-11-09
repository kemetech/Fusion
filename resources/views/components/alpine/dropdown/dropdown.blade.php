@props(['align' => 'top', 'width' => 'w-48', 'dropdownClasses' => '', 'horizontal' => false, 'icon' =>  'ellipsis-vertical', 'iconSize' => 'md', 'solidIcon' => false, 'iconStroke' => '2', 'trigger' => null, 'heading' => null ])

@php
if ($horizontal){
    $icon = 'ellipsis-horizontal';
}
$alignmentClasses = [
    'left' => 'origin-top-left left-0',
    'top' => 'origin-top',
    'right' => 'origin-top-right right-0',
    'bottom' => 'origin-bottom top-full -translate-y-full'
];
@endphp

<div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false" {{$attributes->class('')}} >
    <div @click="open = ! open" class="cursor-pointer text-secondary-700 " >
        @if ($trigger)
            <div {{$trigger->attributes->merge(['class' => 'text-sm flex items-center gap-2'])}}>
                {{ $trigger }}
                <x-fusion-icon icon='chevron-down' :solid=$solidIcon stroke-width={{$iconStroke}} />
            </div>
        @else
            <x-fusion-icon :icon=$icon  :size=$iconSize :solid=$solidIcon stroke-width={{$iconStroke}} />
        @endif
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute bg-white text-secondary-600   z-50 mt-1  {{$width }} shadow-lg rounded border border-secondary-200/70 p-1  text-sm   {{$alignmentClasses[$align]}}"
            style="display: none;"
            @click="open = false">
            @if ($heading)
                <div class="pt-2 pb-1 font-semibold  text-xs px-1 ">{{$heading}}
                </div>
            @endif
          
            {{ $slot }}
    </div>
</div>
