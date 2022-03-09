<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Partylist as partylistModel;

class Partylist extends Component
{
    use LivewireAlert;
    public $name;
    public $description;
    public $propaganda;
    public $partylistid;
    public $addmodal = false;
    public $editmodal = false;
    public $info = false;
    public function render()
    {
        return view('livewire.partylist', [
            'partylists' => partylistModel::get(),
        ]);
    }

    public function save()
    {
        partylistModel::create([
            'partylist_name' => $this->name,
            'description' => $this->description,
            'propaganda' => $this->propaganda,
        ]);
        $this->name = "";
        $this->description = "";
        $this->propaganda = "";
        $this->addmodal = false;
        $this->alert('success', 'Added Succesfully');
    }

    public function edit($id)
    {
        $data = partylistModel::find($id);
        $this->name = $data->partylist_name;
        $this->description = $data->description;
        $this->propaganda = $data->propaganda;
        $this->partylistid = $data->id;
        $this->editmodal = true;
    }

    public function updatepartylist()
    {

        $data = partylistModel::find($this->partylistid);

        $data->update([
            'partylist_name' => $this->name,
            'description' => $this->description,
            'propaganda' => $this->propaganda,
        ]);
        $this->editmodal = false;
    }

    public function savenew()
    {
        partylistModel::create([
            'partylist_name' => $this->name,
            'description' => $this->description,
            'propaganda' => $this->propaganda,
        ]);
        $this->name = "";
        $this->description = "";
        $this->propaganda = "";
        $this->alert('success', 'Added Succesfully');
    }

    public function delete($id)
    {
        partylistModel::find($id)->delete();
    }

    public function viewparty($id)
    {
        $data = partylistModel::find($id);
        $this->name = $data->partylist_name;
        $this->description = $data->description;
        $this->propaganda = $data->propaganda;
        $this->partylistid = $data->id;
        $this->info = true;
    }
}
