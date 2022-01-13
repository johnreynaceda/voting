<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use App\Models\Position;
use App\Models\User;

use App\Models\Vote as voteModel;

class Tabulation extends Component
{
    public function render()
    {
        return view('livewire.tabulation', [
            'positions' => Candidate::all()->groupBy('position_id'),
            'votes' => voteModel::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
