<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Post;

Route::get('/eloquent', function () {
    $posts =  Post::where('id', '>=', 20)
        ->orderby('id', 'desc')
        ->take(3)
        ->get();
    foreach ($posts as $post) {
        echo "$post->id $post->title <br>";
    }
    //return view('welcome');
});