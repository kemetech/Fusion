@props(['id' => null, 'size' => 'default', 'required' => false])
<label {{$attributes->class([
    'font-medium after:font-medium after:text-danger-500  block text-gray-600 dark:text-gray-400', 
      "after:content-['*']" => $required,
      'text-sm' => $size == 'default',
      'text-xs' => $size == 'sm',
      'text-base' => $size == 'lg'
])}}>
      {{$slot}}
</label>  