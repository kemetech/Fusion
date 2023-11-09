

@php

    $classes = Arr::toCssClasses([
        'focus:outline-none focus:ring-transparent text-secondary-700 dark:text-secondary-300  w-full disabled:cursor-not-allowed cursor-pointer',
        $sizeClasses[$size],
        $styleClasses[$style],
        'border-red-600 ring-red-500 dark:border-red-600' => $errors->first($name) && !$noError,
        $radiusClasses[$radius] => $style == 'default',
        'px-0' => $style != 'default'
    ])
@endphp

<div for="{{$id}}">
    @if ($label)
        <x-fusion-label class="mb-2" for="{{$id}}" :size=$size :required=$required>
        {{$label}}
        </x-label>     
    @endif
    <select 
    {{$attributes->merge([
        'class' => $classes,
        'id' => $id
        ])}}  
        @required($required)
        {{-- class="  border border-gray-300 text-gray-900 text-sm rounded block form-select focus:ring-blue-500 focus:border-blue-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" --}}
        >
        @if ($placeholder)
        <option>{{$placeholder}}</option>
        @endif
        @if ($options)
        @foreach ($options as $option)
            <option  value="{{$option}}">{{$option}}</option>
        @endforeach
        @endif
        
        {{$slot}}
    </select>
    @if (!$noError)
        @error($name)
        <p class="block mt-1 text-sm text-danger-600 dark:text-danger-500 flex items-center"><span class="text-xl">&#x2022</span> {{$message}}</p>
        @enderror
    @endif  
</div>
