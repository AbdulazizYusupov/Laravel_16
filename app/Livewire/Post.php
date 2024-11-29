<?php

namespace App\Livewire;

use Livewire\Component;

class Post extends Component
{
    public $models;
    public $categories;
    public $activeForm = false;
    public $title;
    public $description;
    public $category_id;
    public $editTitle;
    public $editDesc;
    public $editCategory;
    public $editId;
    public $searchTitle = '';
    public $searchDesc = '';
    public $searchCat = '';
    public function mount()
    {
        $this->all();
    }

    public function all()
    {
        $this->models = \App\Models\Post::orderBy('id', 'desc')->get();
        $this->categories = \App\Models\Category::all();
        return $this->models;
    }

    public function render()
    {
        return view('livewire.post');
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
        if (!empty($this->title) && !empty($this->description && !empty($this->category_id))) {
            \App\Models\Post::create([
                'title' => $this->title,
                'description' => $this->description,
                'category_id' => $this->category_id,
            ]);
            $this->activeForm = false;
            $this->title = '';
            $this->description = '';
            $this->category_id = '';
        }
        $this->all();
    }

    public function searchColumps()
    {
        $this->models = \App\Models\Post::where('title', 'LIKE', "{$this->searchTitle}%")
            ->where('description', 'LIKE', "{$this->searchDesc}%")
            ->where('category_id', 'LIKE', "{$this->searchCat}%")
            ->get();
    }
    public function changeModel(\App\Models\Post $model)
    {
        $model->update([
            'status' => !$model->status,
        ]);
        $this->all();
    }
    public function delete($id)
    {
        $post = \App\Models\Post::findOrFail($id);
        if ($post) {
            $post->delete();
        }
        $this->all();
    }
    public function edit($id)
    {
        if ($this->editId === $id) {
            $this->reset('editId', 'editTitle');
            $this->reset('editDesc', 'editCategory');
        } else {
            $this->editId = $id;
            $this->editTitle = $this->models->find($id)->title;
            $this->editDesc = $this->models->find($id)->description;
            $this->editCategory = $this->models->find($id)->category_id;
        }
    }

    public function update($id)
    {
        $this->models->find($id)->update(['title' => $this->editTitle, 'description' => $this->editDesc, 'category_id' => $this->editCategory]);
        $this->reset('editId', 'editTitle', 'editDesc', 'editCategory');
    }
}
