<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use App\Models\Position;
use App\Models\User;
use App\Models\VoteEvent;
use App\Models\Vote as voteModel;

class AdminVotes extends Component
{
    public $name;
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
        VoteEvent::create([
            'event_name' => $this->name,
            'isStart' => true,
        ]);
        $this->name = "";
    }

    public function stop()
    {
        VoteEvent::first()->delete();
    }
}
