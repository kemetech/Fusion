@props(['required' => null, 'label' => null, 'id' => 'toggle', 'size' => 'default', 'disabled' => null, 'dir' => 'default', 'noError' => false, 'name' => null])
@php
    $sizeClasses = [
        'default' => 'w-7 h-4 after:h-3 after:w-3 after:top-[2px] after:left-[2px]',
        'md' => 'w-9 h-5 after:h-4 after:w-4 after:top-[2px] after:left-[2px]',
        'lg' => 'w-11 h-6 after:h-5 after:w-5 after:top-[2px] after:left-[2px]',
];

@endphp

<div >
    <label class="inline-flex items-center gap-2" for="{{$id}}">
    @if ($label && $dir == 'left')
    <x-fusion-label for="{{$id}}" :size=$size :required=$required>
        {{$label}}
      </x-label>  
    @endif
    <div  @class(['relative', 'cursor-not-allowed' => $disabled,
        'cursor-pointer' => !$disabled])>
        <input 
        type="checkbox"
        {{$attributes->merge([
            'id' => $id,
            'name' => $name
            ])}}  
            @class(['sr-only peer',])
        @disabled($disabled) class="sr-only peer">
        <div @class(["border bg-gray-200 peer-focus:outline-none  rounded-full peer dark:bg-gray-600 after:border-0 dark:after:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute  after:bg-gray-50 after:border-gray-300 after:border after:rounded-full after:transition-all dark:border-gray-600 peer-checked:bg-primary-500 peer-checked:dark:bg-primary-500" , 'border border-red-600 dark:border-red-600 ' => $errors->first($name) && !$noError, $sizeClasses[$size]]) ></div>
    </div>
   
    @if ($label && $dir == 'default')
    <x-fusion-label  for="{{$id}}" :size=$size :required=$required>
        {{$label}}
      </x-label>  
    @endif
    </label>
    @if (!$noError)
        @error($name)
        <p class="block mt-1 text-sm text-danger-600 dark:text-danger-500"><span class="font-medium">*</span> {{$message}}</p>
        @enderror
    @endif  
    
</div>
  