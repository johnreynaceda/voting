<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Partylist;
use App\Models\Candidate;
use App\Models\Position;
use App\Models\Vote;
use Livewire\WithPagination;

class Report extends Component
{
    // public winners
    use WithPagination;
    public $partylistid;
    public $student = 1;
    public $tabulate = 1;
    public $winners = [];
    public function render()
    {

        // $this->getWinners();
        return view('livewire.report', [
            'students' => (($this->student == 1) ? Student::paginate(5) : Student::whereHas('user', function ($k) {
                $k->where('isvoted', 0);
            })->paginate(10)),

            'partylists' => Partylist::get(),
            'candidates' => Candidate::where('partylist_id', 'like', '%' . $this->partylistid . '%')->paginate(10),
            // 'positions' => Candidate::all()->groupBy('position_id'),
            'positions' => Position::get(),

        ]);
    }

    
}
