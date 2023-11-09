@props(['message' => null, 'type' => 'success', 'manual' => false, 'timeout' => '5000', 'position' => 'top right', 'title' => null, 'zIndex' => 'z-50'])
@php
if (Session::has('fusion message')){
    $type = session()->get('fusion type');
    $title = session()->get('fusion title');
    $message = session()->get('fusion message');
}
$color = [
    'success' => 'bg-success-400',
    'error' => 'bg-danger-400 ',
    'info' => 'bg-info-400 ',
    'warning' => 'bg-warning-400 ',
];
$textColor = [
    'success' => 'text-success-500',
    'error' => 'text-danger-500 ',
    'info' => 'text-info-500 ',
    'warning' => 'text-warning-500 ',

];
$icon = [
    'success' => 'check-circle',
    'error' => 'exclamation-triangle',
    'info' => 'information-circle',
    'warning' => 'check-circle',

];
$positionClasses = [
    'bottom left' => 'bottom-4 left-4',
    'bottom right' => 'bottom-4 right-4',
    'top center' => 'top-4 left-1/2 transform -translate-x-1/2 -translate-y-0',
    'top left' => 'top-4 left-4',
    'bottom center' => 'bottom-4 left-1/2 transform -translate-x-1/2 -translate-y-0 ',
    'top right' => 'top-4 right-4',
];

@endphp
@if(Session::has('fusion message'))
    <div
        x-cloak
        x-data="{ showAlert: true }"
        x-show="showAlert"
        x-init="setTimeout(() => showAlert = false, {{$timeout}})"
        x-transition:leave="transition duration-500 transform eas-in"
        x-transition:leave-end="opacity-0"
        x-on:click="showAlert = false"
        @class(['fixed shadow-lg w-full max-w-sm items-stretch  rounded-lg flex-col flex bg-white  text-secondary-500 text-sm',
            $positionClasses[$position],
            $zIndex,])
        data-dismissible="alert" >
        <div @class(['pl-4 pr-12 py-4 flex gap-4  ',])>
            <x-icon icon="x-mark" size="md" class="absolute right-4 top-4 cursor-pointer" />
            <x-icon class={{$textColor[$type]}} icon={{$icon[$type]}} size="lg" />
            <div>
                <p class="text-secondary-800 font-medium capitalize">{{$title}}</p>
                <p class=" ">{{ $message }}</p>
            </div>
        </div>
        <div x-data="{progress: 0, progressInterval: null}"
            x-init="progressInterval = setInterval(() => {
                    progress = progress + 1;
                    if (progress >= 100) {
                        clearInterval(progressInterval);
                    }
                }, {{$timeout}}/100);"
            class="relative w-full h-0.5 overflow-hidden ">
            <span :style="'width:' + progress + '%'" @class(['absolute h-full mx-1 duration-300 ease', $color[$type]])></span>
        </div>
    </div>
@endif

    

