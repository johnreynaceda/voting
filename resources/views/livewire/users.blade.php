<div x-data="{add: @entangle('addmodal'), edit: @entangle('editmodal')}">
    <div class="hidden mt-8 sm:block">
        <div class="flex mb-3 px-6 justify-between items-center">
            <h1 class="  uppercase font-bold text-gray-600">List of Users</h1>
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
        <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Username
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Role
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $i++ }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->username }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->role }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right flex text-sm font-medium">
                                <button wire:click="edit({{ $user->id }})"
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
                                <button wire:click="delete({{ $user->id }})"
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
                                Student Available.</td>
                        </tr>
                    @endforelse

                    <!-- More people... -->
                </tbody>
            </table>
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
                class="inline-block align-bottom bg-white     text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full ">
                <div class="bg-blue-600 h-1 w-full"></div>
                <div class="flex px-2 border-b py-1 justify-between items-center">
                    <h1 class="font-bold text-main">ADD USERS</h1>
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
                        <label for="email" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input wire:model="name" type="email" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Username</label>
                        <div class="mt-1">
                            <input type="text" wire:model="username" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input type="password" wire:model="password" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="location" class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="location" wire:model="role" name="location"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option selected>---Select Role---</option>
                            <option value="SSG Adviser">SSG Adviser</option>
                            <option value="SSG President">SSG President</option>
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
                        <button wire:click="savenew" class="bg-main px-4 py-1 mr-1 text-white">Save & New</button>
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
                    <h1 class="font-bold text-main">EDIT STUDENT</h1>
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
                        <label for="email" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input wire:model="name" type="email" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Username</label>
                        <div class="mt-1">
                            <input type="text" wire:model="username" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input type="password" wire:model="password" name="email" id="email"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="">
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="location" class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="location" wire:model="role" name="location"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option selected>---Select Role---</option>
                            <option value="SSG Adviser">SSG Adviser</option>
                            <option value="SSG President">SSG President</option>
                        </select>
                    </div>


                    <div class="mt-6 flex justify-end ">
                        <svg wire:loading wire:target="saveedit" width="35" height="35" viewBox="0 0 45 45"
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

                        <button wire:click="saveedit" class="bg-main px-4 py-1 text-white">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
