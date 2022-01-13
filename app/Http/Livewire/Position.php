<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Position as positionModel;

class Position extends Component
{
    use LivewireAlert;
    public $name;
    public $positionid;
    public $limit;
    public $addmodal = false;
    public $editmodal = false;
    public function render()
    {
        return view('livewire.position', [
            'positions' => positionModel::get(),
        ]);
    }

    public function save()
    {
        positionModel::create([
            'position_name' => $this->name,
            'vote_limit' => $this->limit,
        ]);
        $this->name = "";
        $this->limit = "";
        $this->addmodal = false;
        $this->alert('success', 'Added Succesfully');
    }

    public function edit($id)
    {
        $data = positionModel::find($id);
        $this->name = $data->position_name;
        $this->limit = $data->vote_limit;
        $this->positionid = $data->id;
        $this->editmodal = true;
    }

    public function updateposition()
    {

        $data = positionModel::find($this->positionid);

        $data->update([
            'position_name' => $this->name,
            'vote_limit' => $this->limit,
        ]);
        $this->editmodal = false;
    }

    public function savenew()
    {
        positionModel::create([
            'position_name' => $this->name,
            'vote_limit' => $this->limit,
        ]);
        $this->name = "";
        $this->limit = "";
        $this->alert('success', 'Added Succesfully');
    }

    public function delete($id)
    {
        positionModel::find($id)->delete();
    }
}
