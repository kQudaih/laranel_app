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

//Route::pattern('id', '[0-9]+');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'pagesController@index');

//Route::get('/about', function(){
//    return view('pages.about');
//});

Route::get('/about', 'pagesController@about');

//Route::get('/services', function(){
//   return view('pages.services'); 
//});

Route::get('/services', 'pagesController@services');

//Route::get('/posts/{id}/{author}', function($id, $author){
//   return "The post id is ". $id . " And the author is ". $author;
//});



//posts routes
Route::get('/posts','PostsController@index')->name('posts.index');


Route::get('/posts/create','PostsController@create')->name('posts.create');
Route::post('/posts','PostsController@store')->name('posts.store');
Route::get('/posts/{id}','PostsController@show')->name('posts.show');

Route::get('/posts/{id}/edit','PostsController@edit')->name('posts.edit');
Route::put('/posts/{id}','PostsController@update')->name('posts.update');

Route::delete('/posts/{id}','PostsController@destroy')->name('posts.destroy');





/*<php

//example
Route::get('user/{id?}/{username?}', function($id = null, $username = null){
    return 'Welcome to User page user id =>'.$id.' | username is =>'. $username;
});
    
//Pattern for regular expression    
//->where(['id'=>'[0-9]+', 'username'=>'[A-Za-z]+']);

Route::get('test/{id?}', function(){
    return '
    <form method="POST">
        <input type="hidden" name="_token" value="'.csrf_token().'"/>
        <input type="text" name="foo" />
        <input type="submit" value="send" />
        <input type="hidden" name="_method" value="POST"/>
    </form>
    ';
});

Route::any('anyroute', function(){
    return 'Welcome to ANY route '.request('foo');
});
*/

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
