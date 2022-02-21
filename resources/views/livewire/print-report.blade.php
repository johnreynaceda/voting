<div>
    <div class="flex justify-center flex-col items-center">
        <h1 class="font-bold">Bai Saripinang National High School</h1>
        <h1>Bai Saripinang Bagumbayan, Sultan Kudarat</h1>
    </div>
    @if ($type == 'student')
        <div class="mt-3">
            <h1 class=" font-bold ">List of Students</h1>
            @if ($filter == 0)
                <h1>ABSTAIN</h1>
            @else
            @endif
            <div class="mt-2 w-full">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Student ID
                            </th>
                            <th scope="col"
                                class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Firstname
                            </th>
                            <th scope="col"
                                class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Middlename
                            </th>
                            <th scope="col"
                                class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Lastname
                            </th>
                            <th scope="col"
                                class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Grade Level
                            </th>
                            <th scope="col"
                                class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gender
                            </th>


                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($students as $student)
                            <tr>
                                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $student->student_id }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                    {{ $student->firstname }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                    {{ $student->middlename }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                    {{ $student->lastname }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                    {{ $student->gender }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                    {{ $student->grade_level }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-2 whitespace-nowrap text-right flex text-sm font-medium">
                                    No
                                    Student Available.</td>
                            </tr>
                        @endforelse

                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    @elseif($type == 'candidate')
        <div class="mt-3">
            <h1 class=" font-bold ">List of Candidates of
                {{ App\Models\Partylist::where('id', $filter)->first()->partylist_name }} Partylist</h1>
            <div class="mt-2 w-full">
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
                                <td colspan="7" class="px-6 py-4 whitespace-nowrap text-right flex text-sm font-medium">
                                    No
                                    candidate Available.</td>
                            </tr>
                        @endforelse

                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>

    @elseif($type == 'position')
        <div class="mt-3">
            <h1 class=" font-bold ">List Posisition
            </h1>
            <div class="mt-2 w-full">
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
                                <td colspan="7" class="px-6 py-4 whitespace-nowrap text-right flex text-sm font-medium">
                                    No
                                    Position Available.</td>
                            </tr>
                        @endforelse

                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>

    @elseif($type == 'partylist')
        <div class="mt-3">
            <h1 class=" font-bold ">List of Partylist</h1>
            <div class="mt-2 w-full">
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
                                <td colspan="7" class="px-6 py-4 whitespace-nowrap text-right flex text-sm font-medium">
                                    No
                                    Student Available.</td>
                            </tr>
                        @endforelse

                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="mt-3">
            <h1 class="font-bold uppercase">Tabulation</h1>
            <div class="mt-4">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @forelse ($positions as $key => $item)
                        <div
                            class="relative rounded-lg border border-gray-300 bg-white  shadow-sm  items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <div class="header p-1 px-2 bg-main rounded-t-lg w-full text-white">
                                {{ App\Models\Position::find($key)->position_name }}</div>
                            <div class="p-2">
                                <ul role="list" class="  divide-y divide-gray-200">
                                    @forelse ($item as $candidate)
                                        <li class="  pr-2">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                    <img class="h-8 w-8 rounded-full"
                                                        src="{{ asset('/storage/student/' . $candidate->student->image->url) }}"
                                                        alt="">
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-sm font-bold text-gray-800 truncate">
                                                        {{ $candidate->student->firstname }}
                                                        {{ $candidate->student->lastname }}
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate">
                                                        {{ $candidate->partylist->partylist_name }} Partylist
                                                    </p>
                                                </div>
                                                <div>
                                                    <span
                                                        class="font-bold text-main text-lg">{{ $candidate->votes->count() }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                    @endforelse

                                </ul>
                            </div>
                        </div>
                    @empty
                    @endforelse

                    <!-- More people... -->
                </div>
            </div>
        </div>
    @endif
</div>
