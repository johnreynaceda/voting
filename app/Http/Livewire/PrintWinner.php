<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use App\Models\Student;
use App\Models\Partylist;
use App\Models\Position;

class PrintWinner extends Component
{
    public $partylistid;
    public $student = 1;
    public $tabulate = 1;
    public $winners = [];

    public function render()
    {
        $this->getWinners();
        return view('livewire.print-winner', [
            'students' => (($this->student == 1) ? Student::get() : Student::whereHas('user', function ($k) {
                $k->where('isvoted', 0);
            })->get()),

            'partylists' => Partylist::get(),
            'candidates' => Candidate::where('partylist_id', 'like', '%' . $this->partylistid . '%')->get(),
            'positions' => Candidate::all()->groupBy('position_id'),

        ]);
    }

    public function getWinners()
    {
        unset($this->winners);
        $this->winners = [];
        $positions = Position::get();

        foreach ($positions as $pos) {

            if ($pos->vote_limit > 1) {

                $winner = Candidate::withCount(['votes' => function ($q) {
                    $q->where('isfinal', true);
                }])->where('position_id', $pos->id)->orderBy('votes_count', 'desc')->take($pos->vote_limit)->get();
                foreach ($winner as $key => $value) {
                    $this->winners[] = array('position' => $pos->position_name, 'id' => $value->id, 'votes' => $value->votes_count);
                }
            } else {
                $winner = Candidate::withCount(['votes' => function ($q) {
                    $q->where('isfinal', true);
                }])->where('position_id', $pos->id)->orderBy('votes_count', 'desc')->first();

                $this->winners[] = array('position' => $pos->position_name, 'id' => $winner->id, 'votes' => $winner->votes->count());
            }
        }
    }
}
