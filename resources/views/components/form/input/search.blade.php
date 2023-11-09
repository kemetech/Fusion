@php
  // dd($btnAtt)  
@endphp
<div >
  @if ($label)
    <label for="{{$id}}" 
      @class([ 'after:ml-0.5 after:text-red-400 block mb-2 text-gray-600 dark:text-gray-400', 
               "after:content-['*']" => $required ]) >
               {{$label}}
    </label>
  @endif
  <div  @class([ "relative flex items-center text-sm  w-full flex-wrap text-secondary-400 dark:text-secondary-400"])  >
    <div @class(['absolute flex gap-3 items-center ', 'right-0' => $iconDir == 'right']) >
        <x-fusion-button {{$attributes->whereStartsWith(['wire:click'])}}  class="rounded-e-md" radius="rounded right" :href=$btnHref  icon='magnifying-glass'  variant='ghost' color='secondary'  />
    </div> 
    <input  {{$attributes->class([$fieldClasses, 'border-red-600 ring-red-500' => $errors->first($name) && !$noError, 'pl-10' => $iconDir == 'left', 'pr-10' => $iconDir == 'right'])->merge(['id' => $id, 'name' => $name, 'type' => 'search' ])}} 
             @required($required)>
        
  </div>
  @if ($hint)
    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{$hint}}.</p>
  @endif
  @if ($errors->first($name) && !$noError)
    <p class="mt-2 text-sm text-danger-600 dark:text-danger-500"><span class="font-medium">*</span> {{$errors->first($name)}}</p>
  @endif    

</div>