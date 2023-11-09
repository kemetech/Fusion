@props(['required' => null,'label' => null, 'dir' => 'right', 'size' => 'default', 'disabled' => null, 'id' => null, 'name' => null, 'noError' => false, 'value' => null ])
@php
    $sizeClasses = [
        'default' => 'w-4 h-4',
        'md' => 'w-5 h-5',
        'lg' => 'w-6 h-6',
];

    $fieldClasses = Arr::toCssClasses([
      'disabled:cursor-not-allowed cursor-pointer border border-gray-300 dark:border-gray-600 bg-gray-50   text-primary-500 checked:dark:bg-primary-500 dark:bg-gray-800 focus:ring-0 focus:ring-offset-0', 
      $sizeClasses[$size],
      'border-red-500 dark:border-red-600' => $errors->first($name),
]);
@endphp

<div>
    <label for="{{$id}}" class="mb-1 flex gap-2 items-center ">
        @if ($label && $dir == 'left')
        <x-fusion-label for="{{$id}}" :size=$size :required=$required>
            {{$label}}
          </x-label>  
    @endif
    <input type="radio" 
            {{$attributes->merge([
                'class' => $fieldClasses,
                'id' => $id,
                'name' => $name,
                ])}}  
                @disabled($disabled)

   />
   @if ($label && $dir == 'right')   
   <x-fusion-label for="{{$id}}" :size=$size :required=$required>
    {{$label}}
  </x-label>  
@endif
    </label>
</div>
