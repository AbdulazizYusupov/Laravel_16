<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['text','post_id','parent_id','api'];
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
    public function children()
    {
        return $this->hasMany('App\Models\Comment','parent_id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\Comment','parent_id');
    }
}
