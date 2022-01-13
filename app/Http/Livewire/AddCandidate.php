<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidate as candidateModel;
use App\Models\Student;
use App\Models\Position;
use App\Models\Partylist;
use App\Models\Image;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddCandidate extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $addmodal = false;
    public $name;
    public $studentid;
    public $studentname;
    public $average;
    public $stage;
    public $photo;
    public $image;
    public $positionid;
    public $partylistid;

    public $citizenship;
    public $moral;
    public function render()
    {
        return view('livewire.add-candidate', [
            'candidates' => candidateModel::get(),
            'students' => Student::where('firstname', 'like', '%' . $this->name . '%')->orWhere('lastname', 'like', '%' . $this->name . '%')->get(),
            'positions' => Position::get(),
            'partylists' => Partylist::get(),
        ]);
    }

    public function select($id)
    {
        $data = Student::find($id);
        $this->name = null;
        $this->studentid = $id;
        $this->studentname = $data->firstname . ' ' . $data->lastname;
        $this->photo = $data->image->url;
    }

    public function save()
    {


        $data = candidateModel::create([
            'student_id' => $this->studentid,
            'position_id' => $this->positionid,
            'partylist_id' => $this->partylistid,
            'stage_name' => $this->stage,
            'average' => $this->average,
            'hasGoodMoral' => $this->moral,
            'citizenship' => $this->citizenship,

        ]);



        $this->name = "";
        $this->studentid = "";
        $this->average = "";
        $this->stage = null;

        $this->citizenship = "";

        $this->moral = null;
        $this->addmodal = false;
        $this->alert('success', 'Added Successfully');
        return redirect()->route('admin-candidate');
    }
    public function savenew()
    {


        $data = candidateModel::create([
            'student_id' => $this->studentid,
            'position_id' => $this->positionid,
            'partylist_id' => $this->partylistid,
            'stage_name' => $this->stage,
            'average' => $this->average,
            'hasGoodMoral' => $this->moral,
            'citizenship' => $this->citizenship,
        ]);



        $this->name = "";
        $this->studentid = "";
        $this->average = "";
        $this->stage = null;

        $this->citizenship = "";

        $this->moral = null;
        $this->alert('success', 'Added Successfully');
    }
}
