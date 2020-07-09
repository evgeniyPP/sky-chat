<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/api/groups', function () {
    return App\Group::all();
})->middleware('auth');

Route::get('/api/groups/{group}', function ($group) {
    $messages = App\Group::find($group)->messages;
    return App\Group::find($group)->messages->map(function ($message) {
        $message['user'] = App\User::find($message->user_id)->name;
        return $message;
    });
})->middleware('auth');

Route::view('/{any}', 'root')->where('any', '.*')->middleware('auth');
