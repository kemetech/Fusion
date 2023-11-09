@php
if(!$id){
  $id = 'file-upload';
}
if(!$btn){
  $btn = 'Upload';
}

@endphp
<div class="my-2 " >
    @if ($label)
      <x-fusion-label class="mb-2" for="{{$id}}" :size=$size :required=$required>
        {{$label}}
      </x-label>     
    @endif
      <label  for="{{$id}}" {{$attributes->whereStartsWith('class')->class(['cursor-pointer pr-0 text-secondary-500 dark:text-secondary-400 relative items-center focus-within:border-primary-600  dark:focus-within:border-primary-600  w-full flex flex-wrap', $styleClasses[$style],  $frameSizeClasses[$size], 'border-red-600 ring-red-500 dark:border-red-600' => $errors->first($name) && !$noError, $radiusClasses[$radius] => $style == 'default', 'pl-4' => $style == 'default'])}} >
       
        <input  {{$attributes->whereDoesntStartWith('class')->class(['file:hidden peer w-48 text-secondary-400 active:text-gray-700 cursor-pointer', $fieldClasses, 'placeholder-transparent dark:placeholder-transparent' => $floating])->merge(['id' => $id, 'name' => $name, 'placeholder' => $placeholder ])}} 
                @required($required) 
                type="file"
                >
                <x-fusion-button @class(['border-y-0 border-r-0', 'pr-0' => $style != 'default', 'pr-4' => $style == 'default'] )  tag="span" radius="{{$btnRadius[$radius]}}"  :solid=$solidIcon :icon=$btnIcon :tooltip=$tooltip size={{$btnSize[$size]}} :variant='$btnVariant' :color=$btnColor :btn=$btn :tooltip-dir=$tooltipDir />   

                
                @if ($floating)
                  <span @class(['pointer-events-none absolute  top-0 -translate-y-1/2 p-0.5 text-secondary-400 peer-focus:text-secondary-700 dark:peer-focus:text-secondary-50 dark:text-gray-30 transition-all peer-placeholder-shown:top-1/2  peer-focus:top-0 after:text-danger-500 bg-inherit after:font-medium' , $floatingSize[$size], "after:content-['*']" => $required, 'ml-6' => $iconDir == 'left']) >
                    {{$placeholder}}
                  </span>
                @endif

               
                
      </label>
      @if ($hint)
        <p class="text-xs pt-1 text-gray-500 dark:text-gray-400 ">{{$hint}}.</p>
      @endif
      @if (!$noError)
      
          @error($name)
          <p class="block mt-1 text-sm text-danger-600 dark:text-danger-500 flex items-center"><span class="text-xl">&#x2022</span> {{$message}}</p>
          @enderror
      @endif   
  
    </div>