@props(['trigger' => null, 'title' => null, 'body' => null, 'footer' => null, 'header' => null, 'background' => 'default', 'full' => false, 'close' => 'show'])

<div x-data="{ modalOpen: false }" x-on:keydown.escape.window="modalOpen = false" >
    <div x-on:click="modalOpen=true">{{$trigger}}</div>
    <template x-teleport="body" class="fixed ">
        <div x-show="modalOpen" x-cloak 
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" >

            @if ($full && $close == 'show')
                <x-fusion-button circle x-on:click="modalOpen=false" variant="ghost" icon="x-mark" class="fixed top-4 right-4 z-[99]"  />
            @endif            

            <div  @class(['fixed top-0 left-0 z-50 flex items-center justify-center', ' h-screen w-screen' => !$full]) >
                @if (!$full)
                    <div   x-on:click="modalOpen=false"
                            @class(['absolute inset-0 w-full h-full', 
                            'bg-black bg-opacity-40' => $background == 'default',
                            'backdrop-blur bg-gray-400 bg-opacity-60' => $background == 'blur',
                            ])>
                    </div>
                @endif
                <div {{$attributes->class([  'z-[99] bg-white  shadow-lg leading-relaxed text-gray-500 dark:text-gray-400 space-y-4',
                                            'sm:max-w-lg sm:rounded-lg p-4' => !$full,
                                            'h-screen w-screen' => $full
                                            ])}}> 
                    @if (!$full)
                        @if ($header)
                            <div {{$header->attributes->class(['rounded-t'])}}>
                                    {{$header}}
                                    
                            </div>
                            <x-fusion-devider />
                        @endif
                        @if ($title)
                            <div class='flex items-center justify-between rounded-t  '>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    {{$title}}
                                </h3>
                                <x-fusion-button circle x-on:click="modalOpen=false" variant="ghost" icon="x-mark"   />
                            </div>
                            <x-fusion-devider />
                        @endif
                    @endif
                    <div >
                        {{$slot}}
                    </div>
                    @if (!$full)
                        @if ($footer)
                            <x-fusion-devider />
                            <div {{$footer->attributes->class(['flex items-center space-x-2 0 rounded-b '])}} >
                                {{$footer}}
                            </div>  
                        @endif 
                    @endif                        
                </div>
            </div>
        </div>    
    </template>
</div>