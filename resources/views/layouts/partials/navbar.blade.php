<div
    class="border-b sticky top-0 bg-white shadow-md px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
    <div class="flex-1 min-w-0">
        <h1 class="text-lg font-bold leading-6 text-gray-500 sm:truncate">
            @if (Request::routeIs('admin-dashboard'))
                DASHBOARD
            @elseif(Request::routeIs('admin-votes'))
                VOTES
            @elseif(Request::routeIs('admin-student'))
                STUDENTS
            @elseif(Request::routeIs('admin-position'))
                POSITIONS
            @elseif(Request::routeIs('admin-candidate') || Request::routeIs('candidate-add') )
                CANDIDATES
            @elseif(Request::routeIs('admin-partylist'))
                PARTYLIST

            @elseif(Request::routeIs('admin-users'))
                USERS

            @elseif(Request::routeIs('admin-report'))
                REPORT
            @else

            @endif
        </h1>
    </div>
    <div class="mt-4 flex sm:mt-0 sm:ml-4">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <nav class="flex py-2" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <!-- Heroicon name: solid/home -->
                            <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span class="sr-only">Home</span>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                            @if (Request::routeIs('admin-dashboard'))
                                DASHBOARD
                            @elseif(Request::routeIs('admin-votes'))
                                VOTES
                            @elseif(Request::routeIs('admin-student'))
                                STUDENTS
                            @elseif(Request::routeIs('admin-position'))
                                POSITIONS
                            @elseif(Request::routeIs('admin-candidate') || Request::routeIs('candidate-add') )
                                CANDIDATES
                            @elseif(Request::routeIs('admin-partylist'))
                                PARTYLIST

                            @elseif(Request::routeIs('admin-users'))
                                USERS

                            @elseif(Request::routeIs('admin-report'))
                                REPORT
                            @else

                            @endif
                        </a>
                    </div>
                </li>

            </ol>
        </nav>

    </div>
</div>
