@props(['label' => null, 'required' => false, 'size'=> 'default', 'name' => null, 'options' => null, 'noError' => false, 'disabled' => false, 'col' => false, 'dir' => 'right'])
@php
    $sizeClasses = [
        'default' => 'w-4 h-4',
        'md' => 'w-5 h-5',
        'lg' => 'w-6 h-6',
];
@endphp
<div class="my-2">
    @if ($label)
    <x-fusion-label class="mb-2" :size=$size :required=$required>
      {{$label}}
    </x-label>         
  @endif
  <div @class(['flex gap-4' => !$col, 'flex flex-col gap-1' => $col]) >
    @if ($options)
        @foreach ($options as $option)
            <x-fusion-radio :dir=$dir :disabled=$disabled value="{{$option}}" :name=$name :size=$size @class(['border-red-500' => $errors->first($name) && !$noError])  :label=$option id="{{$option}}-{{$name}}" />
        @endforeach
    @endif
    {{$slot}}
  </div>
  @if (!$noError)
        @error($name)
        <p class="block mt-1 text-sm text-danger-600 dark:text-danger-500 flex items-center"><span class="text-xl">&#x2022</span> {{$message}}</p>
        @enderror
    @endif
</div>