<div>

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
