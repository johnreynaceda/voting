<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use App\Models\Position;
use App\Models\User;
use App\Models\VoteEvent;
use App\Models\Vote as voteModel;
use Carbon\Carbon;

class AdminVotes extends Component
{
    public $name;
    public $start_date;
    public $finish_date;
    public function render()
    {
        return view('livewire.admin-votes', [
            'positions' => Candidate::all()->groupBy('position_id'),
            'votes' => voteModel::where('user_id', auth()->user()->id)->get(),
            'event' => VoteEvent::get(),
        ]);
    }
    public function start()
    {

        //get date
        // $start_date = strtotime($this->start_date);
        // dd(date('Y-m-d H:i:s', ));
        // dd(Carbon::now()->format('Y-m-d H:i:s'));
        // dd(Carbon::parse($this->start_date)->format('Y-m-d H:i:s'));

        VoteEvent::create([
            'event_name' => $this->name,
            'isStart' => true,
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
        ]);
        $this->name = "";
    }

    public function stop()
    {
        VoteEvent::first()->delete();
    }
}
