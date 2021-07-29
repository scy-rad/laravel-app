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
        ->middleware([\App\Http\Middleware\NoPageZero::class])
        ->name('list');

    Route::get('{game}', 'BuilderController@show')
        ->name('show');
});



Route::group([
    'prefix' => 'e/games',
    'namespace' => 'Game',
    'as' => 'games.e.',
    //'middleware' => ['profiling'],    //1 sposób podpięcia middleware jako grupy
    //'middleware' => [\App\Http\Middleware\RequestLog::class],    //1 sposób podpięcia konkretnego middleware
], function() {

    // Route::middleware(['profiling'])->group(
    //     function(){
    //         //i tu dajemy routy, które mają być opakowane middlewarem   //2 sposób podpięcia middleware pod kilka route'ów
    //     }
    // );

    Route::get('dashboard', 'EloquentController@dashboard')
        ->name('dashboard')
        //->middleware(['profiling'])                                  //3 sposób podpięcia middleware do konkretnego route
        ;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
