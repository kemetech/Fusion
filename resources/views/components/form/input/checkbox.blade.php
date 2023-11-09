@props(['required' => null,'label' => null, 'dir' => 'right', 'size' => 'default', 'id' => null, 'name' => null, 'noError' => false, 'disabled' => false])
@php
    $sizeClasses = [
        'default' => 'w-4 h-4',
        'md' => 'w-5 h-5',
        'lg' => 'w-6 h-6',
];
$fieldClasses = Arr::toCssClasses([
      'disabled:cursor-not-allowed cursor-pointer border border-gray-300 dark:border-gray-600  bg-gray-50  rounded dark:checked:bg-primary-500 checked:bg-primary-500 text-primary-500 dark:bg-gray-800 focus:ring-0 focus:ring-offset-0', 
      $sizeClasses[$size],
      'border-red-600 dark:border-red-600 dark:ring-red-500' => $errors->first($name) && !$noError,
]);
@endphp
<div  >
    <label for="{{$id}}" class="flex flex-wrap items-center gap-2">
        @if ($label && $dir == 'left')
        <x-fusion-label for="{{$id}}" :size=$size :required=$required>
            {{$label}}
          </x-label>  
        @endif
    <input type="checkbox" 
            {{$attributes->merge([
                'class' => $fieldClasses,
                'id' => $id,
                'name' => $name,
                ])}}
                @disabled($disabled)

                   />
                   {{$slot}}
    @if ($label && $dir == 'right')   
    <x-fusion-label for="{{$id}}" :size=$size :required=$required>
        {{$label}}
      </x-label>     
    @endif
        </label>
    
    @if (!$noError)
        @error($name)
        <p class="block mt-1 text-sm text-danger-600 dark:text-danger-500 flex items-center"><span class="text-xl">&#x2022</span> {{$message}}</p>
        @enderror
    @endif    
    </div>
