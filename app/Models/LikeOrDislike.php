<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeOrDislike extends Model
{
    protected $fillable = ['post_id','ip','value'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
