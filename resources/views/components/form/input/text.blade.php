
<div class="my-2 " >
  @if ($label)
    <x-fusion-label class="mb-2" for="{{$id}}" :size=$size :required=$required>
      {{$label}}
    </x-label>     
  @endif
    <label for="{{$id}}" {{$attributes->whereStartsWith('class')->class(['flex-wrap text-secondary-500 dark:text-secondary-400 relative items-center focus-within:border-primary-600  dark:focus-within:border-primary-600  w-full flex flex-wrap items-stretch', $styleClasses[$style], 'pr-0' => $btn || $btnIcon || $button, $frameSizeClasses[$size], 'border-red-600 ring-red-500 dark:border-red-600' => $errors->first($name) && !$noError, $radiusClasses[$radius] => $style == 'default'])}} >
      <span class="flex items-center gap-3 text-secondary-500 dark:text-secondary-400 " >
        @if ($icon && $iconDir == 'left')
            <x-fusion-icon :icon=$icon :stroke-width=$iconStroke :solid=$solidIcon :size=$iconSize />
        @endif
        @if ($prefix)<span class="pr-1"> {{$prefix}} </span> @endif  
      </span>

      <input  {{$attributes->whereDoesntStartWith('class')->class([$fieldClasses, 'placeholder-transparent dark:placeholder-transparent' => $floating])->merge(['type' => $type, 'id' => $id, 'name' => $name, 'placeholder' => $placeholder ])}} 
              @required($required)
              @if ($mask)
                    x-mask="{{$mask}}"
              @endif >
              
              @if ($floating)
                <span @class(['pointer-events-none absolute  top-0 -translate-y-1/2 p-0.5 text-secondary-400 peer-focus:text-secondary-700 dark:peer-focus:text-secondary-50 dark:text-gray-30 transition-all peer-placeholder-shown:top-1/2  peer-focus:top-0 after:text-danger-500 bg-inherit after:font-medium' , $floatingSize[$size], "after:content-['*']" => $required, 'ml-6' => $iconDir == 'left']) >
                  {{$placeholder}}
                </span>
              @endif
              <span class="flex items-center gap-3 text-secondary-500 dark:text-secondary-400 " >
                @if ($suffix)<span class="pl-1"> {{$suffix}} </span> @endif  
                @if ($icon && $iconDir == 'right')
                    <x-fusion-icon :icon=$icon :stroke-width=$iconStroke :solid=$solidIcon :size=$iconSize />
                @endif
                
              </span>
              @if ($btn || $btnIcon)
              
                  <x-fusion-button class="rounded-e-md" radius="{{$btnRadius[$radius]}}" :href=$btnHref :solid=$solidIcon :icon=$btnIcon :tooltip=$tooltip :variant=$btnVariant :color=$btnColor :btn=$btn :tooltip-dir=$tooltipDir />
              @endif 
              @if ($button)
                  {{$button}}
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