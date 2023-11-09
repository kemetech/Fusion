@props(['action' => null, 'method' => null, 'upload' => null])
<form @if ($upload)
        enctype="multipart/form-data"
      @endif 
      method="POST"
      {{$attributes->class('space-y-4')->merge(['action' => $action])}}>
    @csrf
    @if ($method)
        @method($method)
    @endif
    {{$slot}}
</form>