<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;
use App\Models\Image;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Voters extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $firstname;
    public $middlename;
    public $lastname;
    public $gender;
    public $level;
    public $search = "";
    public $photo;
    public $studentid;
    public $addmodal = false;
    public $editmodal = false;

    public function render()
    {
        return view('livewire.voters', [
            'students' => Student::where('firstname', 'like', '%' . $this->search . '%')->orWhere('lastname', 'like', '%' . $this->search . '%')->get(),
        ]);
    }

    public function save()
    {
        $filename = $this->photo->getClientOriginalName();
        $this->photo->storeAs('student', $filename, 'public');

        $randomNumber = random_int(100000, 999999);
        // dd($randomNumber);

        $user = User::create([
            'name' => $this->firstname,
            'username' => $randomNumber,
            'email' => $this->firstname . '@gmail.com',
            'password' => Hash::make('password'),
            'user_type_id' => 2,
            'role' => 'student'

        ]);
        $student =  Student::create([
            'user_id' => $user->id,
            'student_id' => $user->username,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'gender' => $this->gender,
            'grade_level' => $this->level,
        ]);

        Image::create([
            'url' => $filename,
            'imageable_id' => $student->id,
            'imageable_type' =>  Student::class,
        ]);

        $this->addmodal = false;
        $this->alert('success', 'added Successfully!');
        $this->reset([
            'firstname',
            'middlename',
            'lastname',
            'gender',
            'photo',
            'level',
        ]);
    }
    public function savenew()
    {
        $filename = $this->photo->getClientOriginalName();
        $this->photo->storeAs('student', $filename, 'public');
        $randomNumber = random_int(100000, 999999);
        // dd($randomNumber);

        $user = User::create([
            'name' => $this->firstname,
            'username' => $randomNumber,
            'email' => $this->firstname . '@gmail.com',
            'password' => Hash::make('password'),
            'user_type_id' => 2,
            'role' => 'student'

        ]);
        $student =  Student::create([
            'user_id' => $user->id,
            'student_id' => $user->username,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'gender' => $this->gender,
            'grade_level' => $this->level,
        ]);

        Image::create([
            'url' => $filename,
            'imageable_id' => $student->id,
            'imageable_type' =>  Student::class,
        ]);

        $this->alert('success', 'added Successfully!');
        // $this->firstname = "";
        // $this->middlename = "";
        // $this->lastname = "";
        // $this->gender = "";
        // $this->photo = "";
        // $this->level = "";
        $this->reset([
            'firstname',
            'middlename',
            'lastname',
            'gender',
            'photo',
            'level',
        ]);
    }

    public function edit($id)
    {
        $data = Student::find($id);
        $this->studentid = $data->id;
        $this->firstname = $data->firstname;
        $this->middlename = $data->middlename;
        $this->lastname = $data->lastname;
        $this->gender = $data->gender;
        $this->level = $data->grade_level;

        $this->editmodal = true;
    }

    public function update()
    {
        $data = Student::find($this->studentid);
        $data->update([
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'gender' => $this->gender,
            'grade_level' => $this->level,
        ]);

        $this->editmodal = false;
        $this->alert('success', 'Updated Successfully!');
        $this->firstname = "";
        $this->middlename = "";
        $this->lastname = "";
        $this->gender = "";
        $this->level = "";
    }

    public function delete($id)
    {
        $student = Student::where('id', $id)->first();
        
        Student::find($id)->delete();
        User::find($student->user->id)->delete();
        $this->alert('success', 'Deleted Successfully!');
    }
}
