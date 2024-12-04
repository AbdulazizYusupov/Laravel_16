<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadval extends Model
{
    protected $fillable = ['student_id','value','data'];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
