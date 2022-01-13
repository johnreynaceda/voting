<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Partylist;
use App\Models\Candidate;

class Report extends Component
{
    public $partylistid;
    public $student = 1;
    public $tabulate = 1;
    public function render()
    {
        return view('livewire.report', [
            'students' => (($this->student == 1) ? Student::get() : Student::whereHas('user', function ($k) {
                $k->where('isvoted', 0);
            })->get()),

            'partylists' => Partylist::get(),
            'candidates' => Candidate::where('partylist_id', 'like', '%' . $this->partylistid . '%')->get(),
            'positions' => Candidate::all()->groupBy('position_id'),
        ]);
    }
}
