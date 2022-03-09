@extends('layouts.admin')
@section('main')
    <div class="px-4 mt-6 sm:px-6 lg:px-8">
        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <li class="col-span-1 bg-white rounded-lg border shadow-inner border-main divide-y divide-gray-200">
                <div class="w-full flex items-center justify-between p-5 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-xl font-bold truncate">{{ \App\Models\Position::count() }}</h3>

                        </div>
                        <p class="mt-1 text-gray-700 font-bold text-sm truncate">Number of Positions</p>
                    </div>
                    <span
                        class="w-10 h-10 flex items-center justify-center bg-blue-400 rounded-full text-white shadow flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7   w-7  " viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M2 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4zM8 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H9a1 1 0 01-1-1V4zM15 3a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V4a1 1 0 00-1-1h-2z" />
                        </svg>
                    </span>
                </div>

            </li>
            <li class="col-span-1 bg-white rounded-lg border shadow-inner border-main divide-y divide-gray-200">
                <div class="w-full flex items-center justify-between p-5 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-xl font-bold truncate">{{ \App\Models\Candidate::count() }}</h3>

                        </div>
                        <p class="mt-1 text-gray-700 font-bold text-sm truncate">Number of Candidates</p>
                    </div>
                    <span
                        class="w-10 h-10 flex items-center justify-center bg-green-600 rounded-full text-white shadow flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                    </span>
                </div>

            </li>
            <li class="col-span-1 bg-white rounded-lg border shadow-inner border-main divide-y divide-gray-200">
                <div class="w-full flex items-center justify-between p-5 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-xl font-bold truncate">{{ \App\Models\Student::count() }}</h3>

                        </div>
                        <p class="mt-1 text-gray-700 font-bold text-sm truncate">Total Voters</p>
                    </div>
                    <span
                        class="w-10 h-10 flex items-center justify-center bg-yellow-500 rounded-full text-white shadow flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                    </span>
                </div>

            </li>
            <li class="col-span-1 bg-white rounded-lg border shadow-inner border-main divide-y divide-gray-200">
                <div class="w-full flex items-center justify-between p-5 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-xl font-bold truncate">
                        @php
                            $total_voted = \App\Models\User::has('votes')->count();
                            // dd($total_voted);
                            
                        @endphp    
                        {{$total_voted}}   
                        </h3>

                        </div>
                        <p class="mt-1 text-gray-700 font-bold text-sm truncate">Voters Voted</p>
                    </div>
                    <span
                        class="w-10 h-10 flex items-center justify-center bg-red-500 rounded-full text-white shadow flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>

            </li>

            <!-- More people... -->
        </ul>
    </div>


    <!-- Projects table (small breakpoint and up) -->
    <div class="hidden mt-8 sm:block">
        <div class="flex mb-3 px-6 justify-between items-center">
            <h1 class="  uppercase font-bold text-gray-600">Votes Tally</h1>
            <a href="{{ route('admin-print', ['type' => 'tabulation']) }}" target="_blank"
                class="bg-green-700 text-white flex items-center p-1 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                        clip-rule="evenodd" />
                </svg>
                <span>Print</span>
            </a>
        </div>
        <div class="px-6">
            @livewire('tabulation')
        </div>
    </div>
@endsection
