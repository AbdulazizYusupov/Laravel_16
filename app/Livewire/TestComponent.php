<?php

namespace App\Livewire;

use App\Models\Test;
use Livewire\Component;

class TestComponent extends Component
{
    public $models;
    public function mount()
    {
        $this->all();
    }
    public function all()
    {
        $this->models = Test::orderBy('status','asc')->get();
        return $this->models;
    }
    public function render()
    {
        return view('livewire.test-component');
    }
    public function updateTest($groupIds)
    {
        foreach ($groupIds as $id) {
            Test::where('id',$id['value'])->update(['status' => $id['order']]);
        }
        $this->models = Test::orderBy('status','asc')->get();
    }
}
