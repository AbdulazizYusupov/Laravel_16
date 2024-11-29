<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $models;
    public $activeForm = false;
    public $name;
    public $editName;
    public $editId;
    public $searchName = '';
    public function mount()
    {
        $this->all();
    }

    public function all()
    {
        $this->models = Category::orderBy('id', 'desc')->get();
        return $this->models;
    }

    public function render()
    {
        return view('livewire.category-component');
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
        if (!empty($this->name)) {
            Category::create([
                'name' => $this->name,
            ]);
            $this->activeForm = false;
            $this->name = '';
        }
        $this->all();
    }

    public function searchColumps()
    {
        $this->models = Category::where('name', 'LIKE', "{$this->searchName}%")->get();
    }
    public function changeModel(Category $model)
    {
        $model->update([
            'status' => !$model->status,
        ]);
        $this->all();
    }
    public function delete($id)
    {
        $post = Category::findOrFail($id);
        if ($post) {
            $post->delete();
        }
        $this->all();
    }
    public function edit(Category $model)
    {
        $this->editId = $model->id;
        $this->editName = $model->name;
    }
    public function update()
    {
        $models = Category::findOrFail($this->editId);
        $models->update([
            'name' => $this->editName,
        ]);
        $this->all();
        $this->editId = '';
        $this->editName = '';
    }
}
