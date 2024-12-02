<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = ['post_id', 'ip', 'count'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
