<?php

namespace App\Livewire;

use Livewire\Component;

class Post extends Component
{
    public $models;
    public $title = '';
    public $description = '';
    public $id;
    public function render()
    {
        $this->models = \App\Models\Post::orderBy('id', 'desc')->get();
        return view('livewire.post');
    }

    public function store()
    {
        if (!empty($this->title) && !empty($this->description)) {
            \App\Models\Post::create([
                'title' => $this->title,
                'description' => $this->description,
            ]);
        }
        $this->title = '';
        $this->description = '';
    }
    public function update($id)
    {
        $post = \App\Models\Post::findOrFail($id);

        if ($post) {
            $post->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
        }
        $this->title = '';
        $this->description = '';
    }
    public function delete($id)
    {
        $post = \App\Models\Post::findOrFail($id);
        if ($post) {
            $post->delete();
        }
    }
}
