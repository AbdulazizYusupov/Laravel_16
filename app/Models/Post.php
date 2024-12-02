<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','description','category_id','status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
    public function views()
    {
        return $this->hasMany(View::class, 'post_id');
    }
    public function like_or_dislike()
    {
        return $this->hasMany(LikeOrDislike::class, 'post_id');
    }
}
