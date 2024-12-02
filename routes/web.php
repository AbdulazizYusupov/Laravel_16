<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/post',\App\Livewire\Post::class);
Route::get('/category',\App\Livewire\CategoryComponent::class);
Route::get('/blog',\App\Livewire\Blog::class);
