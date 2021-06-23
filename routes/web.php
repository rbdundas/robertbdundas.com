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

Auth::routes();

Route::get('/', 'NoAuthController@index')->name('index');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/articles', 'PostController@listArticles')->name('articles');
Route::get('/projects', 'PostController@listProjects')->name('projects');

Route::group([
    "domain" => "https://robertbdundas.com"
], function () {
    Route::get("/wp")->name("wp");
});

Route::prefix('/post')->group(function () {
    Route::get('/view', 'PostController@viewPost')->name('post.view');
    Route::get('/edit', 'PostController@editPost')->name('post.edit');
    Route::get('/new', 'PostController@editPost')->name('post.new');
    Route::post('/save', 'PostController@savePost')->name('post.save');
    Route::get('/publish', 'PostController@publishPost')->name('post.publish');
    Route::get('/unpublish', 'PostController@unpublishPost')->name('post.unpublish');
});
