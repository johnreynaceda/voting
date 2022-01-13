@extends('layouts.app')
@section('main')
    <div class="relative flex w-full">

        <main class=" flex-1 border-r border-main overflow-y-auto relative">
            <div class=" border-b shadow p-2 px-10">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="lg:flex lg:items-center lg:justify-between">
                    <div class="flex-1 min-w-0">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol role="list" class="flex items-center space-x-4">
                                <li>
                                    <div class="flex">
                                        <a href="#" class="text-sm font-medium text-gray-700 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <!-- Heroicon name: solid/chevron-right -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <a href="#"
                                            class="ml-4 text-sm font-medium text-gray-700 hover:text-gray-800">Tabulation</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <h2 class="mt-3 text-2xl font-bold leading-7 text-gray-700 sm:text-3xl sm:truncate">
                            TABULATION
                        </h2>

                    </div>

                </div>

            </div>

            <div class="p-6 px-10">
                <h1 class="text-xl font-bold text-gray-600 uppercase">Vote Tally</h1>
                @livewire('tabulation')
            </div>

    </div>

@endsection
