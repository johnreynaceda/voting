<div>
    <div class="p-6">
        <h1 class="text-2xl font-bold text-main">Add Candidate</h1>
        <div class="flex space-x-5">
            <div class="mt-3  w-96">
                <div class=" mb-1">
                    <label id="listbox-label" class="block text-sm font-medium text-gray-700">
                        Search Student
                    </label>
                    <div class="mt-1 relative">
                        <button type="button"
                            class="bg-white relative w-full border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                            <input wire:model="name" type="text"
                                class="flex-1 w-full h-8 focus:outline-none border-0 focus:ring-0"
                                placeholder="Enter student name...">
                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <!-- Heroicon name: solid/selector -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>

                        <!--
      Select popover, show/hide based on select state.

      Entering: ""
        From: ""
        To: ""
      Leaving: "transition ease-in duration-100"
        From: "opacity-100"
        To: "opacity-0"
    -->
                        @if ($name == null)

                        @else
                            <ul class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                                tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                aria-activedescendant="listbox-option-3">
                                <!--
        Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

        Highlighted: "text-white bg-indigo-600", Not Highlighted: "text-gray-900"
      -->
                                @forelse ($students as $item)
                                    <li wire:click="select({{ $item->id }})" wire:key="select({{ $item->id }})"
                                        class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9"
                                        id="listbox-option-0" role="option">
                                        <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                        <span class="font-normal block truncate">
                                            {{ $item->firstname }} {{ $item->lastname }}
                                        </span>

                                        <!--
          Checkmark, only display for selected option.

          Highlighted: "text-white", Not Highlighted: "text-indigo-600"
        -->
                                        <span class="text-white  absolute inset-y-0 right-0 flex items-center pr-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </li>
                                @empty
                                    No {{ $this->name }} on list...
                                @endforelse

                                <!-- More items... -->
                            </ul>

                        @endif
                    </div>
                </div>
                @if ($studentid == null)
                @else
                    <div class="mb-1">
                        <div class="flex justify-center bg-main rounded-md text-white p-1">
                            {{ $studentname }}
                        </div>
                    </div>
                @endif

                <div class="mb-1">
                    <label for="email" class="block text-sm font-medium text-gray-700">Stage Name</label>
                    <div class="mt-1">
                        <input type="text" name="email" id="email" wire:model="stage"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="mb-1">
                    <label for="location" class="block text-sm font-medium text-gray-700">Position</label>
                    <select wire:model="positionid"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option>--Select Position--</option>
                        @foreach ($positions as $item)
                            <option value="{{ $item->id }}">{{ $item->position_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-1">
                    <label for="location" class="block text-sm font-medium text-gray-700">Partylist</label>
                    <select wire:model="partylistid"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option>--Select Partylist--</option>
                        @foreach ($partylists as $item)
                            <option value="{{ $item->id }}">{{ $item->partylist_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mt-1 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium text-gray-700">Average</label>
                        <div class="mt-1">
                            <input type="number" wire:model="average" name="first-name" id="first-name"
                                autocomplete="given-name"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            @error('average') <span class="error text-sm text-red-600">The average must be at least 85 and above.</span> @enderror
                            </div>

                    <div class="sm:col-span-3">
                        <div class="relative flex mt-4 bg-gray-200 rounded-md px-2 items-start py-4">
                            <div class="min-w-0 flex-1 text-sm">
                                <label for="person-1" class="font-bold text-gray-700 select-none">Has Good
                                    Moral</label>
                            </div>
                            <div class="ml-3 flex items-center h-5">
                                <input wire:model="moral" id="person-1" name="person-1" type="checkbox"
                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>

                        </div>
                    </div>
                </div>


                <div class="mb-1">
                    <label for="email" class="block text-sm font-medium text-gray-700">Citizenship</label>
                    <div class="mt-1">
                        <input wire:model="citizenship" type="text" name="email" id="email"
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
                                <animate attributeName="stroke-width" begin="3s" dur="3s" values="2;0" calcMode="linear"
                                    repeatCount="indefinite" />
                            </circle>
                            <circle cx="22" cy="22" r="8">
                                <animate attributeName="r" begin="0s" dur="1.5s" values="6;1;2;3;4;5;6"
                                    calcMode="linear" repeatCount="indefinite" />
                            </circle>
                        </g>
                    </svg>
                    <button wire:click.prevent="savenew" class="bg-main px-4 py-1 mr-2 text-white">Save &
                        New</button>
                    <button wire:click.prevent="save" class="bg-main px-4 py-1 text-white">Save</button>
                </div>
            </div>
            <div class=" w-72">
                @if ($photo)
                    <img src="{{ asset('/storage/student/' . $photo) }}" class="border w-full object-cover h-72"
                        alt="">
                @endif
            </div>
        </div>
    </div>
</div>
