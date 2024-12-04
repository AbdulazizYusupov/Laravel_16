<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;

class GroupComponent extends Component
{
    public $models;
    public function mount()
    {
        $this->all();
    }
    public function all()
    {
        $this->models = Group::orderBy('tr','asc')->get();
        return $this->models;
    }
    public function render()
    {
        return view('livewire.group-component');
    }

    public function updateGroup($groupIds)
    {
        foreach ($groupIds as $id) {
            Group::where('id',$id['value'])->update(['tr' => $id['order']]);
        }
        $this->models = Group::orderBy('tr','asc')->get();
    }
}
