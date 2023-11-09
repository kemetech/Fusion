@props(['text' => null, 'color' => 'danger', 'style' => 'default', ])
@php
    $bc = "bg-$color-500 ";
    if ($style == 'default'){
        $text = $text;
    } else {
        $text = null;
    }
@endphp
    <div 
    @class(["absolute text-xs inline-flex items-center justify-center  text-white $bc border-2 border-white rounded-full  dark:border-gray-900", 
            'w-3 h-3 bottom-1/2  left-1/2' => $style == 'dot' || 'animate',
            'w-6 h-6 bottom-1/2 left-1/2' => $style == 'default',
            
            ])
            
    >
    @if ($style == 'animate')
        <span class="absolute inline-flex w-full h-full rounded-full opacity-75 {{$bc}} animate-ping"></span>
    @endif

        
        
        {{$text}}</div>
