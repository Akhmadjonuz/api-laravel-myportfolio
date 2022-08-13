<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/all_portfolio', function () {
    return Post::all();
});

Route::post('/create', function(){
    request()->validate([
        'img' => 'required',
        'name' => 'required',
        'url' => 'required',
        'github_url' => 'required',
    ]);

     Post::create([
        'img' => request('img'),
        'name' => request('name'),
        'url' => request('url'),
        'github_url' => request('github_url')
    ]);
    return ['message' => 'Post created'];
});


