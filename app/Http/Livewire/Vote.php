<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use App\Models\Position;
use App\Models\VoteEvent;
use App\Models\User;
use App\Models\Vote as voteModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Vote extends Component
{
    use LivewireAlert;
    public function render()
    {
        return view('livewire.vote', [
            'positions' => Candidate::all()->groupBy('position_id'),
            'votes' => voteModel::where('user_id', auth()->user()->id)->get(),
            'event' => VoteEvent::get(),
        ]);
    }

    public function vote($id, $position)
    {
        $candidate = Candidate::find($id);
        $canVote = auth()->user()->votes()->whereHas('candidate', function ($c) use ($position) {
            $c->where('position_id', $position);
        })->get()->count() < $candidate->position->vote_limit;

        if ($canVote) {
            if (auth()->user()->hasVoted($candidate->id)) {
                $this->alert('error', 'You have already voted this candidate.');
            } else {
                voteModel::create([
                    'user_id' => auth()->user()->id,
                    'candidate_id' => $id,
                    'isfinal' => false,
                ]);
                $this->alert('success', 'Voted Successfully!', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,

                ]);
            }
        } else {
            $this->alert('error', 'You have already voted this position.');
        }
    }

    public function cancelvote($id)
    {
        voteModel::find($id)->delete();
        $this->alert('success', 'Cancel Vote Successfully!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

    public function submit($id)
    {
        voteModel::where('user_id', $id)->update([
            'isfinal' => true,
        ]);
        User::find($id)->update([
            'isvoted' => true,
        ]);
        // $this->alert('success', 'Submitted Successfully!', [
        //     'position' => 'center',
        //     'timer' => 3000,
        //     'toast' => false,

        // ]);
    }
}
