<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidate as candidateModel;
use App\Models\Student;
use App\Models\Position;
use App\Models\Partylist;
use App\Models\Image;

class Candidate extends Component
{
    public $addmodal = false;
    public $name;
    public $studentid;
    public $studentname;
    public $average;
    public $stage;
    public $image;
    public $positionid;
    public $partylistid;
    public $moral;
    public $search="";
    public $editmodal = false;
    public function render()
    {
        return view('livewire.candidate', [
            'candidates' => candidateModel::whereHas('student', function($k){
                $k->where('firstname', 'like', '%'.$this->search.'%')->orWhere('lastname', 'like', '%'. $this->search. '%');
            })->get(),
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
    }

    public function save()
    {
        $filename = $this->image->getClientOriginalName();
        $this->image->storeAs('candidates', $filename, 'public');

        $data = candidateModel::create([
            'student_id' => $this->studentid,
            'position_id' => $this->positionid,
            'partylist_id' => $this->partylistid,
            'stage_name' => $this->stage,
            'average' => $this->average,
            'hasGoodMoral' => $this->moral,
            'citizenship' => $this->citizenship,
            'address' => $this->barangay . ' ' . $this->city . ' ' . $this->municipality . ' ' . $this->province,
        ]);

        Image::create([
            'url' => $filename,
            'imageable_id' => $data->id,
            'imageable_type' =>  candidateModel::class,
        ]);

        $this->name = "";
        $this->studentid = "";
        $this->average = "";
        $this->stage = null;
        $this->barangay = "";
        $this->city = "";
        $this->municipality = "";
        $this->province = "";
        $this->citizenship = "";
        $this->image = null;
        $this->moral = null;
        $this->addmodal = false;
    }
    public function savenew()
    {
        $filename = $this->image->getClientOriginalName();
        $this->image->storeAs('candidates', $filename, 'public');

        $data = candidateModel::create([
            'student_id' => $this->studentid,
            'position_id' => $this->positionid,
            'partylist_id' => $this->partylistid,
            'stage_name' => $this->stage,
            'average' => $this->average,
            'hasGoodMoral' => $this->moral,
            'citizenship' => $this->citizenship,
            'address' => $this->barangay . ' ' . $this->city . ' ' . $this->municipality . ' ' . $this->province,
        ]);

        Image::create([
            'url' => $filename,
            'imageable_id' => $data->id,
            'imageable_type' =>  candidateModel::class,
        ]);

        $this->name = "";
        $this->studentid = "";
        $this->average = "";
        $this->stage = null;
        $this->barangay = "";
        $this->city = "";
        $this->municipality = "";
        $this->province = "";
        $this->citizenship = "";
        $this->image = null;
        $this->moral = null;
    }
}
