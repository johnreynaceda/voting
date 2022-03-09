<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidate as candidateModel;
use App\Models\Student;
use App\Models\Position;
use App\Models\Partylist;
use App\Models\Image;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Candidate extends Component
{
    use WithPagination;
    use LivewireAlert;
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
    public $search = "";
    public $editmodal = false;
    public $candidateid;
    public function render()
    {
        return view('livewire.candidate', [
            'candidates' => candidateModel::whereHas('student', function ($k) {
                $k->where('firstname', 'like', '%' . $this->search . '%')->orWhere('lastname', 'like', '%' . $this->search . '%');
            })->paginate(10),
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

    public function edit($id)
    {

        $data = candidateModel::where('id', $id)->first();
        $this->candidateid = $id;
        $this->name = $data->student->firstname . ' ' . $data->student->lastname;
        $this->stage = $data->stage_name;
        $this->positionid = $data->position_id;
        $this->partylistid = $data->partylist_id;
        $this->average = $data->average;
        $this->moral = $data->hasGoodMoral;
        $this->citizenship = $data->citizenship;

        $this->editmodal = true;
    }

    public function update()
    {
        // dd('haha');
        $data = candidateModel::where('id', $this->candidateid)->first();
        // dd($data);
        $this->validate([
            'average' => 'required|integer|min:84',
        ]);


        $data->update([
            'position_id' => $this->positionid,
            'partylist_id' => $this->partylistid,
            'stage_name' => $this->stage,
            'average' => $this->average,
            'hasGoodMoral' => $this->moral,
            'citizenship' => $this->citizenship,
        ]);
        $this->editmodal = false;
        $this->alert('success', 'Updated Successfully.');
    }

    public function delete($id)
    {
        $data = candidateModel::find($id);
        $data->delete();
        $this->alert('success', "Deleted Successfully");
    }
}
