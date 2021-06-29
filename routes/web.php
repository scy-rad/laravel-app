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

Route::get('/', function () {
    return view('welcome');
});

Route::get('users/{id}',
'User\ProfilController@show'
);

Route::get('users/{userID}/profile', 'UserController@show')
    ->name('user.show');


Route::get('user/{id}',
'User\ProfilController'
);


Route::get('users', 'UserController@list')
    ->name('get.users');


Route::get('users/test/{id}', 'UserController@testShow')
    ->name('get.users.test.show');

Route::post('users/test/post/{id}', 'UserController@testStore')
    ->name('post.users.test.store');

Route::get('users/{id}', 'User\ProfilController@show')
    ->name('get.user.profile');


Route::get('users/{id}/address', 'User\ShowAddress')
    ->where(['id' => '[0-9]+'])
    ->name('get.user.address');


/*
$uri='/games';
Route::get('games', 'GameController@index');
Route::get('games/{$id}', 'GameController@show');

Route::post($uri.'/{$id}', fn() => 'jestem POST');
Route::put($uri, fn() => 'jestem PUT');
Route::patch($uri, fn() => 'jestem PATCH');
Route::delete($uri, fn() => 'jestem DELETE');
*/

Route::resource('games', 'GameController');
/*
-> only([
    'index', 'show'
]);
Route::resource('admin/games', 'GameController')
-> only([
    'store', 'create', 'destroy'
]);
*/
