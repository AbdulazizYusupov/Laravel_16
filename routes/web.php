<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Tests\TestController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/post',\App\Livewire\Post::class);
Route::get('/category',\App\Livewire\CategoryComponent::class);
Route::get('/blog',\App\Livewire\Blog::class);
Route::get('/group',\App\Livewire\GroupComponent::class);
Route::get('/test',\App\Livewire\TestComponent::class);
Route::get('/jadval',\App\Livewire\JadvalComponent::class);
