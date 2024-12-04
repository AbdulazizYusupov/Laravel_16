<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'sort'];

    public function jadvals()
    {
        return $this->hasMany(Jadval::class);
    }

    public function checks($date)
    {
        return $this->jadvals()->where('data', $date)->first();
    }
}
