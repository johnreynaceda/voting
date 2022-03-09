<div>
    <div class="flex justify-center flex-col items-center">
        <h1 class="font-bold">Bai Saripinang National High School</h1>
        <h1>Bai Saripinang Bagumbayan, Sultan Kudarat</h1>
    </div>

    <h1>WINNERS</h1>
    <div class="mt-2 w-full">

        @foreach ($winners as $key => $winner)
            <span class="uppercase">{{ $winner['position'] }}</span> -
            @php
                $student = App\Models\Student::findOrFail($winner['id']);
            @endphp
            <span>{{ $student->firstname }} {{ $student->lastname }}</span>


            <br>
        @endforeach
    </div>
</div>

</div>
