<div
    class="hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 lg:border-r lg:border-gray-200 lg:pt-5 lg:pb-4 lg:bg-main">
    <div class="flex items-end space-x-1  flex-shrink-0 px-6">
        <img class="h-9 w-auto" src="{{ asset('images/vote.png') }}" alt="Workflow">
        <h1 class="text-white font-bold uppercase text-lg">Voting System</h1>
    </div>
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="mt-6 h-0 flex-1 flex flex-col overflow-y-auto">
        <!-- User account dropdown -->
        <div class="px-3 relative inline-block text-left" x-data="{open: false}">
            <div>
                <button type="button" @click="open = !open"
                    class="group w-full  bg-gray-100 rounded-md px-3.5 py-4 text-sm text-left font-medium text-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500"
                    id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="flex w-full justify-between items-center">
                        <span class="flex min-w-0 items-center justify-between space-x-3">
                           <div class="bg-main w-10 h-10 flex items-center justify-center rounded-full  flex-shrink-0">    
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
</svg>
                           </div>
                            <span class="flex-1 flex flex-col min-w-0">
                                <span
                                    class="text-gray-900 text-sm font-medium truncate">{{ auth()->user()->name }}</span>
                                <span class="text-gray-500 text-sm truncate">{{ auth()->user()->role }}</span>
                            </span>
                        </span>
                        <!-- Heroicon name: solid/selector -->
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
            </div>

            <!--
            Dropdown menu, show/hide based on menu state.
  
            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
            <div x-show="open" x-cloak x-collapse
                class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">

                <div class="py-1" role="none">
                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();" class="text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1" id="options-menu-item-5">Logout</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sidebar Search -->

        <!-- Navigation -->
        <nav class="px-3 mt-6">
            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="mobile-teams-headline">
                REPORTS
            </h3>
            <div class="space-y-1 mt-1">
                <!-- Current: "bg-gray-200 text-gray-900", Default: "text-white hover:text-gray-900 hover:bg-gray-50" -->
                <a href="{{ route('admin-dashboard') }}"
                    class="{{ Request::routeIs('admin-dashboard') ? 'bg-gray-50 text-main font-bold' : '' }} text-white hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                    aria-current="page">
                    <!--
                Heroicon name: outline/home
  
                Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
              -->
                    <svg class="mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    DASHBOARD
                </a>

                <a href="{{ route('admin-votes') }}"
                    class="{{ Request::routeIs('admin-votes') ? 'bg-gray-50 text-main font-bold' : '' }} text-white hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/view-list -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class=" group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                    VOTES
                </a>
                <a href="{{ route('admin-report') }}"
                    class="{{ Request::routeIs('admin-report') ? 'bg-gray-50 text-main font-bold' : '' }} text-white hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/view-list -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    REPORTS
                </a>

            </div>

        </nav>
        <nav class="px-3 mt-6">
            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="mobile-teams-headline">
                MANAGE
            </h3>
            <div class="space-y-1 mt-1">
                <!-- Current: "bg-gray-200 text-gray-900", Default: "text-white hover:text-gray-900 hover:bg-gray-50" -->
                <a href="{{ route('admin-student') }}"
                    class="{{ Request::routeIs('admin-student') ? 'bg-gray-50 text-main font-bold' : '' }} text-white hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                    aria-current="page">
                    <!--
                Heroicon name: outline/home
  
                Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
              -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class=" group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    STUDENTS
                </a>

                <a href="{{ route('admin-position') }}"
                    class="{{ Request::routeIs('admin-position') ? 'bg-gray-50 text-main font-bold' : '' }} text-white hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/view-list -->

                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                    </svg>
                    POSITIONS
                </a>
                <a href="{{ route('admin-partylist') }}"
                    class="{{ Request::routeIs('admin-partylist') ? 'bg-gray-50 text-main font-bold' : '' }} text-white hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/view-list -->

                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
                            clip-rule="evenodd" />
                    </svg>
                    PARTYLIST
                </a>

                <a href="{{ route('admin-candidate') }}"
                    class="{{ Request::routeIs('admin-candidate') ? 'bg-gray-50 text-main font-bold' : '' }} text-white hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/clock -->

                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    CANDIDATES
                </a>
                <a href="{{ route('admin-users') }}"
                    class="{{ Request::routeIs('admin-users') ? 'bg-gray-50 text-main font-bold' : '' }} text-white hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/clock -->

                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    USERS
                </a>
            </div>

        </nav>
    </div>
</div>
