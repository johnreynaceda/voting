<div>
    <span>Form No. 1</span>
    <div class="flex flex-col items-center">
        <h1 class="font-bold">Bai Saripinang National High School</h1>
        <h1 class="leading-3">Bai Saripinang, Bagumbayan, Sultan Kudarat</h1>
    </div>

    <h1 class="mt-7 font-bold text-center">CERTIFICATE OF CANDIDACY</h1>

    <div class="mt-7">
        <p class="indent-10 text-justify">I, <span
                class="font-bold px-5 border-gray-900 border-b-2 uppercase text-lg">{{ $candidate->student->firstname }}
                {{ $candidate->student->lastname }}</span> , hereby announce my candidacy for the office of
            <span
                class="font-bold text-lg px-5 border-b-2 uppercase border-gray-900">{{ $candidate->position->position_name }}</span>
            for the Supreme Student
            Government in the General
            Election on
            ________________________ ; after being sworn to in accordance with law, hereby state the following:
        </p>
    </div>
    {{-- @if ()
        
    @endif --}}
    <div class="mt-7 flex space-x-5">
        {{-- <p class="font-bold flex  uppercase text-lg">1. FULL NAME: <span
                class="pl-5 border-b-2  flex space-x-10 ">{{ $candidate->student->lastname }},
                {{ $candidate->student->firstname }} {{ $candidate->student->middlename }}</span></p> --}}
        <h1 class="font-bold text-lg">1. FULL NAME</h1>
        <div class=" flex space-x-4">
            <div class="flex flex-col divide-y-2 divide-black">
                <span class="text-center font-bold text-lg uppercase">{{ $candidate->student->lastname }}</span>
                <span class="text-center">Surname</span>
            </div>
            <div class="flex flex-col divide-y-2 divide-black">
                <span class="text-center font-bold text-lg uppercase">{{ $candidate->student->firstname }}</span>
                <span class="text-center">Firstname</span>
            </div>
            <div class="flex flex-col divide-y-2 divide-black">
                <span class="text-center font-bold text-lg uppercase">{{ $candidate->student->middlename }}</span>
                <span class="text-center">Middlename</span>
            </div>
        </div>
    </div>
    <div class="mt-1">
        <p class="font-semibold flex indent-8 uppercase ">ONE (1) NICKNAME or STAGENAME:
            <span class="font-bold text-lg">{{ $candidate->stage_name }}</span>
        </p>
    </div>
    <div class="mt-2">
        <p class="font-semibold flex   ">2. POLITICAL PARTY TO WHICH I BELONG: (If does not belong to any,
            state “Independent”)
        </p>
    </div>
    <div class="flex justify-center">
        <div class="flex flex-col divide-y-2 divide-black">
            <span class="text-center font-bold text-lg uppercase">{{ $candidate->partylist->partylist_name }}</span>
            <span class="text-center">(Full name of political party/group/coalition)</span>
        </div>
    </div>
    <div class="mt-4 flex space-x-4">
        <span class="font-bold">GRADE LEVEL: <span
                class="text-lg border-b-2 border-gray-900">{{ $candidate->student->grade_level }}</span></span>
        <span class="font-bold">AVERAGE: <span
                class="text-lg border-b-2 border-gray-900">{{ $candidate->average }}</span></span>
    </div>
    <div class="mt-4 flex space-x-4">
        <span class="font-bold">CITIZENSHIP: <span
                class="text-lg uppercase border-b-2 border-gray-900">{{ $candidate->citizenship }}</span></span>

    </div>

    <div class="mt-7">
        <p class="text-justify indent-10">That I am eligible to the said office; that I will support and defend the SSG
            Constitution and Bylaws and I will maintain true faith and allegiance thereto; that I will obey the laws,
            legal orders and
            decrees promulgated by the duly constituted authorities; and this obligation imposed by my oath is
            assumed voluntarily; without mental reservation or purpose of evasion; and the facts stated herein are
            true the best of my knowledge.</p>
    </div>

    <div class="mt-10 flex justify-end">
        <div class="flex flex-col divide-y-2 divide-black">
            <span class="text-center font-bold text-lg uppercase"></span>
            <span class="text-center">(Signature of Candidate)</span>
        </div>
    </div>

    <div class="mt-7">
        <p class="text-justify indent-10">SUBSCRIBE AND SWORN to before me this _____ day of _________________20_____ at
            _______________________________________________affiant exhibiting to me his/her Res. Cert. No.
            _______________ issued on ______________________at__________________________________</p>
    </div>

    <div class="mt-10 flex justify-end">
        <div class="flex flex-col divide-y-2 divide-black">
            <span class="text-center font-bold text-lg uppercase"></span>
            <span class="text-center">(Authorized to Administer Oath)</span>
        </div>
    </div>
</div>
