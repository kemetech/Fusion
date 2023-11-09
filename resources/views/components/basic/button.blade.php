@php
    $tag = $href ? 'a' : $tag;
  
    // $defaultAttributes = [
    //     'wire:loading.attr'  => 'disabled',
    //     'wire:loading.class' => '!cursor-wait',
    //     'wire:target'        => ($spinner && strlen($spinner) > 1) ? $spinner : null,
    // ];
@endphp
<{{$tag}} {{$attributes->class([$classes])->merge(['type' => 'button', 'href' => $href])}}  @disabled($disabled) >

  @if ($icon && $iconDir == 'left')
    <x-fusion-icon :icon=$icon :solid=$solidIcon :stroke-width=$iconStroke :size=$iconSize/>
  @endif

  {{$btn}}
{{$slot}}
  @if ($icon && $iconDir == 'right')
    <x-fusion-icon :icon=$icon :solid=$solidIcon :stroke-width=$iconStroke :size=$iconSize/>
  @endif

  @if ($tooltip)
      <x-fusion-tooltip dir="{{$tooltipDir}}" tooltip="{{$tooltip}}"/>
  @endif

  @if ($notification)
      <x-fusion-notification :text=$notification :color=$notificationColor :style=$notificationStyle />
  @endif

</{{$tag}}>