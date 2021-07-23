<?php

use App\Http\Controllers\Api\GameController;
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


Route::group([
    'prefix' => 'b/games',
    'namespace' => 'Game',
    'as' => 'games.b.'
], function() {

    Route::get('dashboard', 'BuilderController@dashboard')
        ->name('dashboard');

    Route::get('', 'BuilderController@index')
        ->name('list');

    Route::get('{game}', 'BuilderController@show')
        ->name('show');
});



Route::group([
    'prefix' => 'e/games',
    'namespace' => 'Game',
    'as' => 'games.e.'
], function() {

    Route::get('dashboard', 'EloquentController@dashboard')
        ->name('dashboard');

    Route::get('', 'EloquentController@index')
        ->name('list');

    Route::get('{game}', 'EloquentController@show')
        ->name('show');
});




 Route::get('/', 'Home\MainPage')
     ->name('home.mainPage');

Route::get('users', 'UserController@list')
    ->name('get.users');

Route::get('users/{userId}', 'UserController@show')
    ->name('get.user.show');

//Route::get('users/{id}/profile', 'User\ProfilController@show')
//    ->name('get.user.profile');

Route::get('users/{id}/address', 'User\ShowAddress')
    ->where(['id' => '[0-9]+'])
    ->name('get.users.address');


/*
$uri='/games';
Route::get('games', 'GameController@index');
Route::get('games/{$id}', 'GameController@show');

Route::post($uri.'/{$id}', fn() => 'jestem POST');
Route::put($uri, fn() => 'jestem PUT');
Route::patch($uri, fn() => 'jestem PATCH');
Route::delete($uri, fn() => 'jestem DELETE');
*/

//Route::resource('b/games', 'GameController');
// -> only([
//     'index', 'show'
// ]);

Route::resource('admin/games', 'GameController')
-> only([
    'store', 'create', 'destroy'
]);

