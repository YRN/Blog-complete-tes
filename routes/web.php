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

Route::get('/test', function () {
    return App\Post::find(3)->category;
});

Route::get('/',[
    'uses' =>'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/post/{slug}',[
    'uses' =>'FrontEndController@singlePost',
    'as' => 'post.single'
]);
Route::get('/category/{id}',[
    'uses' =>'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}',[
    'uses' =>'FrontEndController@tag',
    'as' => 'tag.single'
]);

Route::get('/results',function(){
    $posts = \App\Post::where('title','like','%'.request('query').'%')->get();

    return view('results')->with('posts',$posts)
                        ->with('title','Search results: '.request('query'))
                        ->with('settings',\App\Setting::first())
                        ->with('categories',\App\Category::take(5)->get())
                        ->with('query',request('query'));
});

Auth::routes();




Route::group(['prefix'=> 'admin','middleware'=>'auth'], function(){
    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::get('/post', [
        'uses' => 'PostController@index',
        'as' => 'post'
    ]);
    
    Route::get('/post/create', [
        'uses' => 'PostController@create',
        'as' => 'post.create'
    ]);
    Route::get('/post/delete/{id}', [
        'uses' => 'PostController@destroy',
        'as' => 'post.delete'
    ]);
    Route::get('/post/edit/{id}', [
        'uses' => 'PostController@edit',
        'as' => 'post.edit'
    ]);
    Route::post('/post/update/{id}', [
        'uses' => 'PostController@update',
        'as' => 'post.update'
    ]);

    Route::get('/post/trashed', [
        'uses' => 'PostController@trashed',
        'as' => 'post.trashed'
    ]);
    Route::get('/post/kill/{id}', [
        'uses' => 'PostController@kill',
        'as' => 'post.kill'
    ]);
    Route::get('/post/restore/{id}', [
        'uses' => 'PostController@restore',
        'as' => 'post.restore'
    ]);
    
    Route::post('/post/store', [
        'uses' => 'PostController@store',
        'as' => 'post.store'
    ]);

    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);
    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);
    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);
    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);

    Route::post('/category/udpate/{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);
    
    Route::get('/tag', [
        'uses' => 'TagController@index',
        'as' => 'tags'
    ]);
    Route::get('/tag/create', [
        'uses' => 'TagController@create',
        'as' => 'tags.create'
    ]);
    Route::post('/tag/store', [
        'uses' => 'TagController@store',
        'as' => 'tags.store'
    ]);
    Route::get('/tag/edit/{id}', [
        'uses' => 'TagController@edit',
        'as' => 'tags.edit'
    ]);
    Route::post('/tag/update/{id}', [
        'uses' => 'TagController@update',
        'as' => 'tags.update'
    ]);
    Route::get('/tag/delete/{id}', [
        'uses' => 'TagController@destroy',
        'as' => 'tags.delete'
    ]);

    Route::get('/user', [
        'uses' => 'UserController@index',
        'as' => 'users'
    ]);
    Route::get('/user/create', [
        'uses' => 'UserController@create',
        'as' => 'users.create'
    ]);
    Route::post('/user/store', [
        'uses' => 'UserController@store',
        'as' => 'users.store'
    ]);
    Route::get('/user/admin/{id}', [
        'uses' => 'UserController@admin',
        'as' => 'users.admin'
    ]);
    Route::get('/user/not-admin/{id}', [
        'uses' => 'UserController@not_admin',
        'as' => 'users.not.admin'
    ]);
    Route::get('/user/profile', [
        'uses' => 'ProfilesController@index',
        'as' => 'users.profile'
    ]);
    Route::post('/user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as' => 'users.profile.update'
    ]);

    Route::get('/user/delete/{id}', [
        'uses' => 'UserController@destroy',
        'as' => 'users.delete'
    ]);

    Route::post('/Setting/update/{id}', [
        'uses' => 'SettingController@update',
        'as' => 'settings.update'
    ]);
    Route::get('/Setting', [
        'uses' => 'SettingController@index',
        'as' => 'settings'
    ]);
});