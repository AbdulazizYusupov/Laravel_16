<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\LikeOrDislike;
use App\Models\View;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use function Sodium\increment;

class Blog extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $check = false;
    public $comments;
    public $text;
    public $blog;
    public $reply = null;
    public $react = null;
    public $parent_id;

    public function render()
    {
        $categories = \App\Models\Category::all();
        $blogs = \App\Models\Post::orderBy('id','desc')->paginate(9);
        return view('livewire.blog', compact('blogs','categories'))->layout('components.layouts.blog');
    }

    public function show($id)
    {
        $this->check = true;
        $this->blog = \App\Models\Post::findOrFail($id);

        $existingView = \App\Models\View::where('post_id', $id)->where('ip', request()->ip())->first();

        if (!$existingView) {
            \App\Models\View::create([
                'post_id' => $id,
                'ip' => request()->ip(),
            ]);
        }
        $this->react = LikeOrDislike::where('post_id', $this->blog->id)
            ->first();
        $this->comments = \App\Models\Comment::where('post_id', $id)->get();
    }

    public function comment($id)
    {
        Comment::create([
            'post_id' => $id,
            'text' => $this->text,
            'api' => request()->ip(),
        ]);
        $this->text = '';
        $this->show($id);
    }

    public function answer($id,$postId)
    {
        if ($this->parent_id == $id) {
            $this->reply = null;
            $this->parent_id = null;
        }else{
            $this->reply = $postId;
            $this->parent_id = $id;
        }
        $this->show($postId);
    }
    public function replyTest()
    {
        Comment::create([
            'post_id' => $this->reply,
            'text' => $this->text,
            'api' => request()->ip(),
            'parent_id' => $this->parent_id,
        ]);
        $this->text = '';
        $this->show($this->reply);
        $this->reply = null;
        $this->parent_id = null;
    }
    public function reaction($id, $value)
    {
        $existingReaction = LikeOrDislike::where('post_id', $id)
            ->where('ip', request()->ip())
            ->first();

        if ($existingReaction) {
            if ($existingReaction->value == $value) {
                $existingReaction->update([
                    'value' => null,
                ]);
            } else {
                $existingReaction->update([
                    'value' => $value,
                ]);
            }
        } else {
            LikeOrDislike::create([
                'post_id' => $id,
                'ip' => request()->ip(),
                'value' => $value,
            ]);
        }
    }
}
