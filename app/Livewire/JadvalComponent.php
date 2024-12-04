<?php

namespace App\Livewire;

use App\Models\Jadval;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class JadvalComponent extends Component
{
    public $today;
    public $users;
    public $models = [];
    public $inputValues = [];

    public function mount()
    {
        $this->today = Carbon::now()->format('Y-m');
        $this->users = User::all();
        $this->models = Jadval::all();
        $this->initInputValues();
    }

    public function initInputValues()
    {
        foreach ($this->models as $jadval) {
            $this->inputValues[$jadval->user_id][$jadval->data] = $jadval->value;
        }
    }

    public function updateValue($userId, $date, $value)
    {
        $jadval = Jadval::firstOrNew([
            'user_id' => $userId,
            'data' => $date,
        ]);

        $jadval->value = $value;
        $jadval->save();

        $this->models = Jadval::all();
        $this->initInputValues();
    }

    public function render()
    {
        return view('livewire.jadval-component');
    }
}
