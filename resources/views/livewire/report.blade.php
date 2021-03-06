<div class="p-10">
    <div class="list mb-3 border-b">
        <div class="flex  justify-between items-end">
            <h1 class="text-xl font-bold text-main">List of Students</h1>
            <div class="flex space-x-2 items-center">
                <div>

                    <select id="location" name="location" wire:model="student"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="1">All</option>
                        <option value="2">Abstain</option>


                    </select>
                </div>
                <a href="{{ route('admin-print', ['type' => 'student', 'student' => $student]) }}" target="_blank"
                    class="py-1 px-2 bg-green-700 space-x-1  text-white flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Print</span>
                </a>
            </div>
        </div>
        <div class="mt-2 border">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Student ID
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
                            Grade Level
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Gender
                        </th>


                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($students as $student)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $student->student_id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $student->firstname }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $student->middlename }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $student->lastname }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $student->gender }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $student->grade_level }}
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
        <div class="mt-2">
                {{$students->links()}}
            </div>
    </div>

    <div class="py-3 flex space-x-5">
        <div class=" w-6/12">
            <div class="list mb-3 border-b">
                <div class="flex  justify-between items-end">
                    <h1 class="text-xl font-bold text-main">List of Positions</h1>
                    <div class="flex space-x-2 items-center">

                        <a href="{{ route('admin-print', ['type' => 'position']) }}" target="_blank"
                            class="py-1 px-2 bg-green-700 space-x-1  text-white flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Print</span>
                        </a>
                    </div>
                </div>
                <div class="mt-2 border">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Position
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Vote Limit
                                </th>


                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($positions as $position)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $position->position_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $position->vote_limit }}
                                    </td>


                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"
                                        class="px-6 py-4 whitespace-nowrap text-right flex text-sm font-medium"> No
                                        Position Available.</td>
                                </tr>
                            @endforelse

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-6/12">
            <div class="list mb-3 border-b">
                <div class="flex  justify-between items-end">
                    <h1 class="text-xl font-bold text-main">List of Partylist</h1>
                    <div class="flex space-x-2 items-center">

                        <a href="{{ route('admin-print', ['type' => 'partylist']) }}" target="_blank"
                            class="py-1 px-2 bg-green-700 space-x-1  text-white flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Print</span>
                        </a>
                    </div>
                </div>
                <div class="mt-2 border">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Partylist Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>


                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($partylists as $partylist)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $partylist->partylist_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $partylist->description }}
                                    </td>


                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"
                                        class="px-6 py-4 whitespace-nowrap text-right flex text-sm font-medium"> No
                                        Student Available.</td>
                                </tr>
                            @endforelse

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="list mb-3 border-b">
        <div class="flex  justify-between items-end">
            <h1 class="text-xl font-bold text-main">List of Candidates</h1>
            <div class="flex space-x-2 items-center">
                <div class="flex items-center space-x-1">
                    <span>Filter:</span>
                    <div>

                        <select id="location" name="location" wire:model="partylistid"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option>--Select Filter--</option>
                            @foreach ($partylists as $item)
                                <option value="{{ $item->id }}">{{ $item->partylist_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <a href="{{ route('admin-print', ['type' => 'candidate', 'filter' => $partylistid]) }}"
                    target="_blank" class="py-1 px-2 bg-green-700 space-x-1  text-white flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Print</span>
                </a>
            </div>
        </div>
        <div class="mt-2 border">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>

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


                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($candidates as $candidate)
                        <tr>

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
    <div class="list mb-3 border-b">
        <div class="flex  justify-between items-end">
            <h1 class="text-xl font-bold text-main">Tabulation</h1>
            <div class="flex space-x-3 items-center">
                <div>

                    {{-- <select id="location" name="location" wire:model="tabulate"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="1">All</option>
                        <option value="2">Winner</option>


                    </select> --}}
                    <a href="{{ route('admin-printwinner') }}" target="_blank"
                        class="py-1 px-2 bg-green-700 space-x-1  text-white flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Print Winner</span>
                    </a>
                </div>
                <a href="{{ route('admin-print', ['type' => 'tabulation']) }}" target="_blank"
                    class="py-1 px-2 bg-green-700 space-x-1  text-white flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Print</span>
                </a>
            </div>
        </div>
        @if ($tabulate == 1)
            @livewire('tabulation')


        @else
            <div class="mt-3  w-96">

                {{-- @foreach ($winners as $key => $winner)
                    <span>{{ $winner['position'] }}</span>
                    @php
                        $student = App\Models\Student::findOrFail($winner['id']);
                    @endphp
                    <span>{{ $student->firstname }}</span>
                    <span>{{ $winner['votes'] }}</span>

                    <br>
                @endforeach --}}


            </div>
        @endif
    </div>
