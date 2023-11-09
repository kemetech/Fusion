<div class="my-2">
  @if ($label)
  <x-fusion-label class="mb-2" for="{{$id}}" :size=$size :required=$required>
    {{$label}}
  </x-label>        
  @endif
    <label for="{{$id}}" {{$attributes->whereStartsWith('class')->class([' dark:focus-within:border-primary-600 flex-wrap text-secondary-500 dark:text-secondary-400 relative focus-within:border-primary-600 w-full flex flex-wrap items-stretch pr-0', $styleClasses[$style], $frameSizeClasses[$size], 'border-red-600 ring-red-500 dark:border-red-600 dark:ring-red-500' => $errors->first($name) && !$noError, $radiusClasses[$radius] => $style == 'default'])}} >
      <textarea  
      {{$attributes->whereDoesntStartWith('class')->class([$fieldClasses, 'placeholder-transparent dark:placeholder-transparent' => $floating])->merge(['rows' => '2', 'id' => $id, 'name' => $name, 'placeholder' => $placeholder ])}}
              @if ($autogrow)
                x-data="{
                  resizeTextarea() {
                    $el.style.height = 'auto';
                    $el.style.height = `${$el.scrollHeight}px`
                  }
                }"
                x-init="resizeTextarea()"
                @input="resizeTextarea()"
              @endif
              @required($required)
      >{{$slot}}</textarea>
      @if ($floating)
      <span @class(['pointer-events-none absolute  top-0 -translate-y-1/2 p-0.5 text-secondary-400 peer-focus:text-secondary-700 dark:peer-focus:text-secondary-50 dark:text-gray-30 transition-all peer-placeholder-shown:top-1/2  peer-focus:top-0 after:text-danger-500 bg-inherit after:font-medium' , $floatingSize[$size], "after:content-['*']" => $required]) >
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