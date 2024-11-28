<?php

namespace App\Livewire;

use Livewire\Component;

class Homa extends Component
{
    public $a = 0;
    public $num1 = '';
    public $num2 = '';
    public $result = 0;
    public $st = "";
    public $mx = ['*', '/', '+', '-', '%'];

    public function render()
    {
        return view('livewire.homa');
    }

    public function add()
    {
        $this->a++;
    }

    public function sub()
    {
        if ($this->a > 0) {
            $this->a--;
        }
    }

    public function hisob()
    {
        switch ($this->st) {
            case '+':
                $this->result = $this->num1 + $this->num2;
                break;
            case '-':
                $this->result = $this->num1 - $this->num2;
                break;
            case '/':
                $this->result = $this->num1 / $this->num2;
                break;
            case '*':
                $this->result = $this->num1 * $this->num2;
                break;
            case '%':
                $this->result = $this->num1 % $this->num2;
                break;
        }
        $this->num1 = '';
        $this->num2 = '';
    }
}
