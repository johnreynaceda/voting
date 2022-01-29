<div>
    <div class="p-6 bg-gray-100 ">

        @if ($event->isEmpty())
            <div class="mb-3">
                <label for="email" class="block text-sm font-medium text-gray-700">Election Name</label>
                <div class="mt-1">
                    <input type="text" wire:model="name" name="email" id="email"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block  sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <button wire:click="start" class="py-1 px-2 bg-main text-white rounded-md">Start Voting</button>

        @else
            <div class="flex space-x-3">
                <h1 class="text-xl font-bold text-main">Voting is now Available</h1>
                <button wire:click="stop" class="bg-red-600 py-1 px-2 text-white rounded-md"> Close Voting</button>
            </div>
        @endif

    </div>
    @forelse ($positions as $key => $item)
        <div class="flex flex-col p-6 w-full">
            <div class="md:flex md:items-center md:justify-between md:space-x-5 py-1 shadow  bg-main rounded-tr-full">
                <div class="flex text-white items-center space-x-3 px-2">
                    <div class="flex-shrink-0 ">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
                        </div>
                    </div>
                    <!--
              Use vertical padding to simulate center alignment when both lines of text are one line,
              but preserve the same layout if the text wraps without making the image jump around.
            -->
                    <div class="">
                        <h1 class="text-xl font-bold uppercase ">
                            {{ App\Models\Position::find($key)->position_name }}
                        </h1>

                    </div>
                </div>

            </div>
            <div class="mt-3">
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 w-full">
                    @forelse ($item as $candidate)
                        <li class="col-span-1 bg-white rounded-lg relative w-full shadow divide-y divide-gray-200">
                            <div>
                                <div class="relative">
                                    <img class="h-20 w-full opacity-70 bg-gray-700 object-cover lg:h-20"
                                        src="{{ asset('images/bsnhsbg.jpg') }}" alt="">

                                    <div
                                        class="absolute bottom-0 font-bold text-white text-xl items-end flex flex-col right-2">
                                        <span
                                            class=" text-sm text-white  px-2 rounded-md bg-opacity-70 animate animate-pulse bg-main ">{{ $candidate->partylist->partylist_name }}
                                            Partylist</span>
                                        <span class="bg-main px-2 rounded-md">{{ $candidate->student->firstname }}
                                            {{ $candidate->student->lastname }}</span>
                                    </div>
                                </div>
                                <div class="max-w-5xl relative mx-auto px-2 sm:px-6 lg:px-2">
                                    <div class="-mt-12 sm:-mt-16 mb-5 sm:flex sm:items-end sm:space-x-5">
                                        <div class="flex">
                                            <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                                                src="{{ asset('/storage/student/' . $candidate->student->image->url) }}"
                                                alt="">
                                        </div>
                                        <div
                                            class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">

                                            <div
                                                class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">

                                                <button type="button" disabled
                                                    wire:click="vote({{ $candidate->id }},{{ App\Models\Position::find($key)->id }})"
                                                    class="inline-flex justify-center px-4 py-2  bg-green-700  shadow-sm text-sm font-medium rounded-md  text-white  focus:outline-none">
                                                    <!-- Heroicon name: solid/phone -->

                                                    <span>VOTE</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            @if (auth()->user()->hasVoted($candidate->id))
                                <div
                                    class="absolute bg-main bg-opacity-60 flex justify-center items-center top-0 left-0 w-full h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-20 w-20 text-green-600 bg-white rounded-full" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @endif
                        </li>

                    @empty

                    @endforelse

                    <!-- More people... -->
                </ul>
            </div>
        </div>
    @empty

    @endforelse
</div>
