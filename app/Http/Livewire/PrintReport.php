<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Candidate;

class PrintReport extends Component
{
    public $type;
    public $filter;
    public $student;
    public function mount()
    {
        $this->type = request('type');
        $this->filter = request('filter');
        $this->student = request('student');
    }
    public function render()
    {
        return view('livewire.print-report', [
            'students' => (($this->student == 1) ? Student::get() : Student::whereHas('user', function ($k) {
                $k->where('isvoted', 0);
            })->get()),
            'candidates' => Candidate::where('partylist_id', 'like', '%' . $this->filter . '%')->get(),
            'positions' => Candidate::all()->groupBy('position_id'),
        ]);
    }
}
