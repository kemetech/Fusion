<div class="my-2">
  @if ($label)
  <x-fusion-label class="mb-2" for="{{$id}}" :size=$size :required=$required>
    {{$label}}
  </x-label>         
@endif
  <label  x-data="{ inputQuantity:{{$minimum}}}" 
          x-init="$watch('inputQuantity', (value) => inputQuantity = value < {{$minimum}} ? {{$minimum}} : (value > {{$maximum}} ? {{$maximum}} : value) )"
          for="{{$id}}" {{$attributes->whereStartsWith('class')->class([' dark:focus-within:border-primary-600 bg-gray-50 dark:bg-gray-800 flex-wrap text-secondary-500 dark:text-secondary-400 relative items-center focus-within:border-primary-600 flex ', $styleClasses[$style], 'pr-0' => $btn || $btnIcon || $button, $frameSizeClasses[$size], 'border-red-600 ring-red-500 dark:border-red-600' => $errors->first($name) && !$noError, $radiusClasses[$radius] => $style == 'default'])}}>
      <span class="cursor-pointer flex items-center gap-3 text-secondary-500 dark:text-secondary-400 " >
        <x-fusion-icon x-on:click="inputQuantity--" icon='minus-small' :stroke-width=$iconStroke :solid=$solidIcon :size=$iconSize />
      </span>

    <input  {{$attributes->whereDoesntStartWith('class')->class([$fieldClasses, 'text-center text-center [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none ' ])->merge(['min' => $minimum, 'max' => $maximum, 'id' => $id, 'name' => $name])}} 
            @required($required)
            inputmode="numeric"
            type="number"
            x-model="inputQuantity" />
<span class="cursor-pointer flex items-center text-secondary-500 dark:text-secondary-400 " >
  <x-fusion-icon x-on:click="inputQuantity++" icon='plus-small' :stroke-width=$iconStroke :solid=$solidIcon :size=$iconSize />
</span>

</label>
  @if ($hint)
      <p class="text-sm text-gray-500 dark:text-gray-400 ">{{$hint}}.</p>
    @endif
    @if (!$noError)
        @error($name)
        <p class="block mt-1 text-sm text-danger-600 dark:text-danger-500 flex items-center"><span class="text-xl">&#x2022</span> {{$message}}</p>
        @enderror
    @endif
</div>
