<div x-data="{add: @entangle('addmodal'), edit: @entangle('editmodal')}">
    <div class="hidden mt-8 sm:block">
        <div class="flex mb-3 px-6 justify-between items-center">
            <h1 class="  uppercase font-bold text-gray-600">List of Candidates</h1>
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
                <a href="{{ route('candidate-add') }}"
                    class="bg-main hover:bg-blue-900 text-white flex rounded-r-md items-center p-1 px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Add</span>
                </a>
            </div>
        </div>
        <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Photo
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Firstname
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Middlename
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Lastname
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            stage name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Position
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Partylist
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Average
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            CF
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($candidates as $candidate)
                        <tr>
                            <td class="px-6 py-2 whitespace-nowrap text-sm text-left font-medium text-gray-500">
                                <img src="{{ asset('/storage/student/' . $candidate->student->image->url) }}"
                                    class="h-12 rounded-md w-12" alt="">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left font-medium text-gray-500">
                                {{ $candidate->student->firstname }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left font-medium text-gray-500">
                                {{ $candidate->student->middlename }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                {{ $candidate->student->lastname }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                {{ $candidate->stage_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                {{ $candidate->position->position_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                {{ $candidate->partylist->partylist_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                {{ $candidate->average }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-left text-gray-500">
                                <a href="{{ route('admin-cf', ['id' => $candidate->id]) }}" target="_blank"
                                    class="bg-green-700 px-2 text-white rounded-sm">Generate</a>
                            </td>


                            <td class="px-6 py-6 whitespace-nowrap text-right flex items-center text-sm font-medium">
                                <button wire:click="edit({{ $candidate->id }})"
                                    class="text-green-600 hover:text-green-900 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button wire:click="delete({{ $candidate->id }})"
                                    class="text-red-600 hover:text-red-900 flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 whitespace-nowrap text-right flex text-sm font-medium"> No
                                candidate Available.</td>
                        </tr>
                    @endforelse

                    <!-- More people... -->
                </tbody>
            </table>
        </div>
    </div>
    @php
        $i = rand(1, 100);
    @endphp
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
                class="inline-block align-bottom bg-white     text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full ">
                <div class="bg-blue-600 h-1 w-full"></div>
                <div class="flex px-2 border-b py-1 justify-between items-center">
                    <h1 class="font-bold uppercase text-main">ADD candidate</h1>
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
                                        <li wire:click="select({{ $item->id }})"
                                            wire:key="select({{ $item->id }})"
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
                            <div class="flex bg-main rounded-md text-white p-1">
                                {{ $studentname }}
                            </div>
                        </div>
                    @endif

                    <div class="mb-1">
                        <label class="block text-sm font-medium text-gray-700">Stage Name</label>
                        <div class="mt-1">
                            <input wire:model="stage" type="text"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>

                    <div class="mt-1 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3" wire:ignore>
                            <label class="block text-sm font-medium text-gray-700">Position</label>
                            <select wire:key="{{ \App\Models\Candidate::count() }}" wire:model.lazy="positionid"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option selected>---Select Position---</option>
                                @foreach ($positions as $item)
                                    <option value="{{ $item->id }}">{{ $item->position_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="sm:col-span-3" wire:ignore>
                            <label class="block text-sm font-medium text-gray-700">Partylist</label>
                            <select wire:key="{{ \App\Models\Candidate::count() }}" wire:model.lazy="partylistid"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option selected>---Select Partylist---</option>
                                @foreach ($partylists as $item)
                                    <option value="{{ $item->id }}">{{ $item->partylist_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-1 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Average</label>
                            <div class="mt-1">
                                <input wire:key="{{ \App\Models\Candidate::count() }}" wire:model="average"
                                    type="text" name="email" id="email"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="">
                            </div>
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

                    {{-- <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Average</label>
                        <div class="mt-1">
                            <input wire:model="average" type="text" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div> --}}
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Photo</label>
                        <div class="mt-1">
                            <input wire:model="image" wire:key=" {{ \App\Models\Candidate::count() }}" type="file"
                                name="email" id="email"
                                class=" focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mt-2 grid grid-cols-1 gap-y-2 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">
                                Barangay
                            </label>
                            <div class="mt-1">
                                <input type="text" wire:model="barangay" name="first-name" id="first-name"
                                    autocomplete="given-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">
                                City/District
                            </label>
                            <div class="mt-1">
                                <input type="text" wire:model="city" name="last-name" id="last-name"
                                    autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">
                                Municipality
                            </label>
                            <div class="mt-1">
                                <input type="text" wire:model="municipality" name="last-name" id="last-name"
                                    autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">
                                Province
                            </label>
                            <div class="mt-1">
                                <input type="text" wire:model="province" name="last-name" id="last-name"
                                    autocomplete="family-name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
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
                                    <animate attributeName="stroke-width" begin="3s" dur="3s" values="2;0"
                                        calcMode="linear" repeatCount="indefinite" />
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
                    <h1 class="font-bold text-main">EDIT candidate</h1>
                    <button @click="edit = false" class="hover:text-red-600">
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
                        <label for="email" class="block text-sm font-medium text-gray-700">Firstname</label>
                        <div class="mt-1">
                            <input wire:model="firstname" type="email" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Middlename</label>
                        <div class="mt-1">
                            <input type="email" wire:model="middlename" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Lastname</label>
                        <div class="mt-1">
                            <input type="email" wire:model="lastname" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="location" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select id="location" wire:model="gender" name="location"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option selected>---Select Gender---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="location" class="block text-sm font-medium text-gray-700">Grade Level</label>
                        <select id="location" wire:model="level" name="location"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option selected>---Select Grade Level---</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
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
                        <button wire:click="update" class="bg-main px-4 py-1 text-white">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
