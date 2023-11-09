@props(['errors' => null, 'title' => null, 'noTitle' => false])
@php
    $count = count($errors)
@endphp
@if ($errors->any())
<div class="rounded-lg bg-danger-50 dark:bg-secondary-800 dark:border dark:border-danger-600 p-4">
    @if (!$noTitle)
        <div class="flex gap-2 items-center text-danger-400 pb-3 border-b-2 border-danger-200 dark:border-danger-700">
            <x-fusion-icon icon="exclamation-circle" size="md" />
            <span class="text-sm font-semibold text-danger-800 dark:text-danger-600">
                There were {{$count}} errors with your submission
            </span>
        </div>
    @endif
    {{$slot}}
    <div class="ml-5 pl-1 mt-2">
    <ul class="list-disc space-y-1 text-sm text-danger-700 dark:text-danger-600">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>
    </div>   
@endif
