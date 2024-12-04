<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadval extends Model
{
    protected $fillable = ['user_id','value','data'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
