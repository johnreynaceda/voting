<div x-data="{add: @entangle('addmodal'), edit: @entangle('editmodal')}">
    <div class="hidden mt-8 sm:block">
        <div class="flex mb-3 px-6 justify-between items-center">
            <h1 class="  uppercase font-bold text-gray-600">List of Positions</h1>
            <div class="flex border border-main pl-2 rounded-md">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-main" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                    <input type="text" class="border-0 focus:outline-none focus:ring-0" placeholder="Search...">
                </div>
                <button @click="add = !add"
                    class="bg-main hover:bg-blue-900 text-white flex rounded-r-md items-center p-1 px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Add</span>
                </button>
            </div>
        </div>

        <div class="flex px-6">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div>
                <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @forelse ($positions as $position)
                        <li class="relative col-span-1 flex shadow-sm rounded-md">
                            <div
                                class="flex-shrink-0 flex items-center justify-center w-16 bg-main text-white text-sm font-medium rounded-l-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div
                                class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                <div class="flex-1 px-4 py-4 text-sm truncate">
                                    <a href="#" class="text-gray-900 font-medium hover:text-gray-600">
                                        {{ $position->position_name }}
                                    </a>

                                </div>
                                <div class="flex-shrink-0 pr-2" x-data="{action:false}">
                                    <button type="button" @click="action = !action"
                                        class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                                        id="pinned-project-options-menu-0-button" aria-expanded="false"
                                        aria-haspopup="true">
                                        <span class="sr-only">Open options</span>
                                        <!-- Heroicon name: solid/dots-vertical -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>

                                    <div x-show="action" x-cloak @click.away="action=false"
                                        class="z-10 mx-3 origin-top-right absolute right-5 top-10 w-auto mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                                        role="menu" aria-orientation="vertical"
                                        aria-labelledby="pinned-project-options-menu-0-button" tabindex="-1">

                                        <div class="py-1" role="none">
                                            <button wire:click="edit({{ $position->id }})"
                                                class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                tabindex="-1" id="pinned-project-options-menu-0-item-1">Edit</button>
                                            <button wire:click="delete({{ $position->id }})"
                                                class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                tabindex="-1" id="pinned-project-options-menu-0-item-2">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    @empty
                        <span class="bg-main text-white px-2 rounded-md shadow-sm">No Position Available</span>
                    @endforelse


                </ul>
            </div>

        </div>

    </div>

    <div x-show="add" x-cloak class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!--
                                                          Background overlay, show/hide based on modal state.

                                                          Entering: "ease-out duration-300"
                                                            From: "opacity-0"
                                                            To: "opacity-100"
                                                          Leaving: "ease-in duration-200"
                                                            From: "opacity-100"
                                                            To: "opacity-0"
                                                        -->
            <div x-show="add" x-cloak x-transition:enter=" ease-out duration-300" x-transition:enter-start="opacity-0 "
                x-transition:enter-end="opacity-100 " x-transition:leave=" ease-in duration-200"
                x-transition:leave-start="opacity-100 " x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-main bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!--
                                                          Modal panel, show/hide based on modal state.

                                                          Entering: "ease-out duration-300"
                                                            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            To: "opacity-100 translate-y-0 sm:scale-100"
                                                          Leaving: "ease-in duration-200"
                                                            From: "opacity-100 translate-y-0 sm:scale-100"
                                                            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        -->
            <div x-show="add" x-cloak x-transition:enter=" ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave=" ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white     text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full ">
                <div class="bg-blue-600 h-1 w-full"></div>
                <div class="flex px-2 border-b py-1 justify-between items-center">
                    <h1 class="font-bold text-main">ADD POSITION</h1>
                    <button @click="add = false" class="hover:text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="p-3 px-10">
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Position Name</label>
                        <div class="mt-1">
                            <input wire:model="name" type="email" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Vote Limit</label>
                        <div class="mt-1">
                            <input wire:model="limit" type="email" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>


                    <div class="mt-6 flex justify-end ">
                        <svg wire:loading wire:target="save" wire:target="savenew" width="35" height="35"
                            viewBox="0 0 45 45" xmlns="http://www.w3.org/2000/svg" stroke="#1A374D">
                            <g fill="none" fill-rule="evenodd" transform="translate(1 1)" stroke-width="2">
                                <circle cx="22" cy="22" r="6" stroke-opacity="0">
                                    <animate attributeName="r" begin="1.5s" dur="3s" values="6;22" calcMode="linear"
                                        repeatCount="indefinite" />
                                    <animate attributeName="stroke-opacity" begin="1.5s" dur="3s" values="1;0"
                                        calcMode="linear" repeatCount="indefinite" />
                                    <animate attributeName="stroke-width" begin="1.5s" dur="3s" values="2;0"
                                        calcMode="linear" repeatCount="indefinite" />
                                </circle>
                                <circle cx="22" cy="22" r="6" stroke-opacity="0">
                                    <animate attributeName="r" begin="3s" dur="3s" values="6;22" calcMode="linear"
                                        repeatCount="indefinite" />
                                    <animate attributeName="stroke-opacity" begin="3s" dur="3s" values="1;0"
                                        calcMode="linear" repeatCount="indefinite" />
                                    <animate attributeName="stroke-width" begin="3s" dur="3s" values="2;0"
                                        calcMode="linear" repeatCount="indefinite" />
                                </circle>
                                <circle cx="22" cy="22" r="8">
                                    <animate attributeName="r" begin="0s" dur="1.5s" values="6;1;2;3;4;5;6"
                                        calcMode="linear" repeatCount="indefinite" />
                                </circle>
                            </g>
                        </svg>
                        <button wire:click="savenew" class="bg-main px-4 py-1 mr-2 text-white">Save & New</button>
                        <button wire:click="save" class="bg-main px-4 py-1 text-white">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div x-show="edit" x-cloak class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!--
                                                          Background overlay, show/hide based on modal state.

                                                          Entering: "ease-out duration-300"
                                                            From: "opacity-0"
                                                            To: "opacity-100"
                                                          Leaving: "ease-in duration-200"
                                                            From: "opacity-100"
                                                            To: "opacity-0"
                                                        -->
            <div x-show="edit" x-cloak x-transition:enter=" ease-out duration-300" x-transition:enter-start="opacity-0 "
                x-transition:enter-end="opacity-100 " x-transition:leave=" ease-in duration-200"
                x-transition:leave-start="opacity-100 " x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-main bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!--
                                                          Modal panel, show/hide based on modal state.

                                                          Entering: "ease-out duration-300"
                                                            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            To: "opacity-100 translate-y-0 sm:scale-100"
                                                          Leaving: "ease-in duration-200"
                                                            From: "opacity-100 translate-y-0 sm:scale-100"
                                                            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        -->
            <div x-show="edit" x-cloak x-transition:enter=" ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave=" ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white     text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full ">
                <div class="bg-blue-600 h-1 w-full"></div>
                <div class="flex px-2 border-b py-1 justify-between items-center">
                    <h1 class="font-bold text-main">EDIT POSITION</h1>
                    <button @click="add = false" class="hover:text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="p-3 px-10">
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Position Name</label>
                        <div class="mt-1">
                            <input wire:model="name" type="email" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Vote Limit</label>
                        <div class="mt-1">
                            <input wire:model="limit" type="email" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>


                    <div class="mt-6 flex justify-end ">
                        <svg wire:loading wire:target="save" width="35" height="35" viewBox="0 0 45 45"
                            xmlns="http://www.w3.org/2000/svg" stroke="#1A374D">
                            <g fill="none" fill-rule="evenodd" transform="translate(1 1)" stroke-width="2">
                                <circle cx="22" cy="22" r="6" stroke-opacity="0">
                                    <animate attributeName="r" begin="1.5s" dur="3s" values="6;22" calcMode="linear"
                                        repeatCount="indefinite" />
                                    <animate attributeName="stroke-opacity" begin="1.5s" dur="3s" values="1;0"
                                        calcMode="linear" repeatCount="indefinite" />
                                    <animate attributeName="stroke-width" begin="1.5s" dur="3s" values="2;0"
                                        calcMode="linear" repeatCount="indefinite" />
                                </circle>
                                <circle cx="22" cy="22" r="6" stroke-opacity="0">
                                    <animate attributeName="r" begin="3s" dur="3s" values="6;22" calcMode="linear"
                                        repeatCount="indefinite" />
                                    <animate attributeName="stroke-opacity" begin="3s" dur="3s" values="1;0"
                                        calcMode="linear" repeatCount="indefinite" />
                                    <animate attributeName="stroke-width" begin="3s" dur="3s" values="2;0"
                                        calcMode="linear" repeatCount="indefinite" />
                                </circle>
                                <circle cx="22" cy="22" r="8">
                                    <animate attributeName="r" begin="0s" dur="1.5s" values="6;1;2;3;4;5;6"
                                        calcMode="linear" repeatCount="indefinite" />
                                </circle>
                            </g>
                        </svg>
                        <button wire:click="updateposition" class="bg-main px-4 py-1 text-white">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
