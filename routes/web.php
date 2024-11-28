<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',\App\Livewire\Homa::class);
Route::get('/calc',\App\Livewire\Calc::class);
Route::get('/test',function(){
    return view('test');
});
Route::get('/page',function(){
    return view('page');
});
Route::get('/post',\App\Livewire\Post::class);
