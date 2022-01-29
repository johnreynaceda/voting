<div class="relative flex w-full ">
    @if ($event->isEmpty())
        <div class="flex flex-col w-full justify-center items-center ">
            <img src="{{ asset('images/voted.gif') }}" class="h-40" alt="">
            <h1 class="text-2xl font-bold text-main">Voting is already Closed.</h1>

        </div>
    @else
        @if (auth()->user()->isvoted == 1)
            <div class="flex flex-col w-full justify-center items-center ">
                <img src="{{ asset('images/voted.gif') }}" class="h-40" alt="">
                <h1 class="text-2xl font-bold text-main">You Already Submitted your Votes.</h1>
                <a href="{{ route('student-tabulation') }}" class="hover:underline hover:text-blue-500"> Open
                    Tabulation</a>
            </div>
        @else
            <main class=" flex-1 border-r border-main overflow-y-auto relative">
                <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8">
                    <div class="h-auto">
                        @forelse ($positions as $key => $item)
                            <div
                                class="md:flex md:items-center md:justify-between md:space-x-5 py-1 shadow  bg-main rounded-tr-full">
                                <div class="flex text-white items-center space-x-3 px-2">
                                    <div class="flex-shrink-0 ">
                                        <div class="relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <span class="absolute inset-0 shadow-inner rounded-full"
                                                aria-hidden="true"></span>
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
                            <div wire:poll class="flex shadow p-2 border-b py-4 mb-4">
                                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-2 w-full">
                                    @forelse ($item as $candidate)
                                        <li
                                            class="col-span-1 bg-white rounded-lg relative w-full shadow divide-y divide-gray-200">
                                            <div>
                                                <div class="relative">
                                                    <img class="h-20 w-full opacity-70 bg-gray-700 object-cover lg:h-20"
                                                        src="{{ asset('images/bsnhsbg.jpg') }}" alt="">

                                                    <div
                                                        class="absolute bottom-0 font-bold text-white text-xl items-end flex flex-col right-2">
                                                        <span
                                                            class=" text-sm text-white  px-2 rounded-md bg-opacity-70 animate animate-pulse bg-main ">{{ $candidate->partylist->partylist_name }}
                                                            Partylist</span>
                                                        <span
                                                            class="bg-main px-2 rounded-md">{{ $candidate->student->firstname }}
                                                            {{ $candidate->student->lastname }}</span>
                                                    </div>
                                                </div>
                                                <div class="max-w-5xl relative mx-auto px-2 sm:px-6 lg:px-2">
                                                    <div
                                                        class="-mt-12 sm:-mt-16 mb-5 sm:flex sm:items-end sm:space-x-5">
                                                        <div class="flex">
                                                            <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                                                                src="{{ asset('/storage/student/' . $candidate->student->image->url) }}"
                                                                alt="">
                                                        </div>
                                                        <div
                                                            class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">

                                                            <div
                                                                class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">

                                                                <button type="button"
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
                                                        class="h-20 w-20 text-green-600 bg-white rounded-full"
                                                        viewBox="0 0 20 20" fill="currentColor">
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
                        @empty

                        @endforelse

                    </div>


                </div>
            </main>
            <aside class="flex w-96">
                <div class="relative w-full inset-0 py-6 px-4 sm:px-6 lg:px-8">
                    <div class="h-full  relative rounded-lg">
                        <div class="flex justify-between items-center bg-main px-2 text-white">
                            <h1>Your Voted List</h1>
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="mt-1">
                            <div>
                                <div class="flow-root mt-6 relative">
                                    <ul role="list" class="-my-5 border-b-2 border-main divide-y divide-gray-200">
                                        @forelse ($votes as $item)
                                            <li class="py-2 px-2">
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex-shrink-0">
                                                        <img class="h-8 w-8 rounded-full"
                                                            src="{{ asset('/storage/student/' . $item->candidate->student->image->url) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-bold text-gray-700 truncate">
                                                            {{ $item->candidate->student->firstname }}
                                                            {{ $item->candidate->student->lastname }}
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate">
                                                            {{ $item->candidate->partylist->partylist_name }}
                                                            Partylist
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <button wire:click="cancelvote({{ $item->id }})"
                                                            class="bg-red-500 hover:bg-red-600 text-sm shadow px-2 text-white rounded-xl">cancel</button>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <div class=" h-40 flex flex-col justify-center items-center">
                                                <img src="{{ asset('images/vote1.png') }}" class="h-10"
                                                    alt="">
                                                <h1>Please Cast your vote!</h1>
                                            </div>
                                        @endforelse


                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="absolute bottom-0 w-full left-0">
                            <button wire:click="submit({{ auth()->user()->id }})"
                                class="bg-green-700 w-full py-2 hover:bg-green-900 uppercase text-white font-bold shadow rounded-md">Submit
                                Vote</button>
                        </div>
                    </div>
                </div>
            </aside>
        @endif
    @endif
</div>
