<?php

namespace App\Livewire;

use App\Models\Jadval;
use App\Models\Student;
use Carbon\Carbon;
use Livewire\Component;

class JadvalComponent extends Component
{
    public $activeForm = false;
    public $date;
    public $name;
    public $studentId;
    public $davomatDate;
    public $students;

    public function mount()
    {
        $this->all();
    }

    public function all()
    {
        $this->date = Carbon::now();
        $this->students = Student::all();
        return $this->students;
    }

    public function render()
    {
        $daysInMonth = $this->date->daysInMonth;
        $days = [];
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $days[] = Carbon::create($this->date->year, $this->date->month, $i);
        }
        return view('livewire.jadval-component', ['days' => $days]);
    }

    public function changeDate($date)
    {
        $this->date = Carbon::parse($date);
    }

    public function inputView($id, $date)
    {
        $this->studentId = $id;
        $this->davomatDate = $date;
    }

    public function createDavomat(Student $student, $date, $value)
    {
        $student->jadvals()->updateOrCreate(
            ['data' => Carbon::parse($date)],
            ['value' => $value],
        );
        $this->studentId = '';
        $this->davomatDate = '';
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id)->delete();
        $this->all();
    }

    public function create()
    {
        $this->activeForm = true;
    }

    public function cancel()
    {
        $this->activeForm = false;
    }

    public function save()
    {
        if (!empty($this->name)) {
            Student::create([
                'name' => $this->name,
            ]);
            $this->activeForm = false;
            $this->name = '';
        }
        $this->all();
    }
}
