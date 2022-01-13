<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidate;

class CandidacyForm extends Component
{
    public $candidate_id;

    public function mount()
    {
        $this->candidate_id = request('id');
    }

    public function render()
    {
        return view('livewire.candidacy-form', [
            'candidate' => Candidate::where('id', $this->candidate_id)->first(),
        ]);
    }
}
