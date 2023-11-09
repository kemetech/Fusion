<div>
    <div class="container flex items-center justify-between h-full  text-purple-600 dark:text-purple-300">
        <!-- Search input -->
        <div class="flex-1">
            <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                <div class="absolute inset-y-0 flex items-center pl-2">
                    <svg fill="currentColor" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model.live="search" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search for projects" aria-label="Search">
            </div>    
        </div>
        <button class="flex items-center justify-between px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" aria-label="Add" >
                <span class="mr-2">Add Record</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
        </button>
    </div>
    
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        @foreach ($columns as $column)
                            <th class="px-4 py-3">
                                <div class="flex items-center ">
                                    <span>{{ $column->column }}</span>
                                    @if ($column->sortable)
                                        <button type="button" class="ml-1"  wire:click="field('{{$column->column}}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </th>
                        @endforeach
                        <th class="px-4 py-3">
                            control
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                    @foreach ($this->data as $item)
                        <tr class="text-gray-700 dark:text-gray-400">

                            @foreach ($columns as $column)
                                <x-fusion-grid-cell type="{{ $column->type }}" item="{{ $item[$column->column] }} " />
                            @endforeach
                            
                            @if ($actions)
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        @foreach ($actions as $action)
                                            <x-fusion-grid-action type="{{$action->action}}" route="{{$action->route}}" {{$action->attributes}} />
                                        @endforeach
                                    </div>
                                </td>    
                            @endif
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $this->data->links('grid::table-pagination') }}
    </div>
</div>