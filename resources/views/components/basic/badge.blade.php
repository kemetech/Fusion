
<span {{$attributes->merge(['class' => $classes])}}  >

    @if ($icon && $iconDir == 'left')
      <x-fusion-icon :icon=$icon :solid=$soliIcon  size={{$iconSize[$size]}}/>
    @endif
  
    {{$badge}}
  
    @if ($icon && $iconDir == 'right')
      <x-fusion-icon :icon=$icon :solid=$soliIcon size={{$iconSize[$size]}}/>
    @endif
  
  </span>