<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Users extends Component
{
    use LivewireAlert;
    public $name;
    public $username;
    public $role;
    public $password;
    public $userid;
    public $addmodal = false;
    public $editmodal = false;
    public function render()
    {
        return view('livewire.users', [
            'users' => User::where('user_type_id', 1)->where('id','!=', auth()->user()->id)->get(),
        ]);
    }

    public function save()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->username . '@gmail.com',
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'role' => $this->role,
            'user_type_id' => 1,
        ]);
        $this->addmodal = false;
        $this->alert('success', 'Users Added Successfully!');
        $this->name = "";
        $this->username = "";
        $this->password = "";
        $this->role = "";
    }
    public function savenew()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->username . '@gmail.com',
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'role' => $this->role,
            'user_type_id' => 1,
        ]);
        $this->alert('success', 'Users Added Successfully!');
        $this->name = "";
        $this->username = "";
        $this->password = "";
        $this->role = "";
    }

    public function edit($id)
    {
        $this->editmodal = true;
        $data = User::find($id);
        $this->name = $data->name;
        $this->username = $data->username;
        $this->role = $data->role;
        $this->userid = $data->id;
    }

    public function saveedit()
    {
        $data = User::find($this->userid);
        $data->update([
            'name' => $this->name,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);
        $this->editmodal = false;
        $this->alert('success', 'Users Updated Successfully!');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        $this->alert('success', 'Users Deleted Successfully!');
    }
}
