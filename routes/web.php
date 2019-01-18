<?php

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

Route::get('/', function () {
    return view('welcome');
});
// Blog
Route::get('/blog','Frontend\PostController@index')->name('blog');
Route::resource('/post','Frontend\PostController');
// Page
Route::get('/contact','Frontend\PageController@contact')->name('contact');
// Auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Sidebar categories
View::composer('frontend.blog.partials.sidebar',function ($view){
    $categories = App\Models\Category::all();
    $view->with('categories',$categories);
});
// Sidebar tags
View::composer('frontend.blog.partials.sidebar',function ($view){
    $tags = App\Models\Tag::all();
    $view->with('tags',$tags);
});