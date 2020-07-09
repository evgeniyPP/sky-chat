<?php

use App\Group;
use App\Message;
use Illuminate\Http\Request;
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
    return Group::find($group)->messages
        ->map(function ($message) {
            $message['user'] = App\User::find($message->user_id)->name;
            return $message;
        });
})->middleware('auth');

Route::post('/api/message', function (Request $request) {
    return Message::create([
        'text' => $request->text,
        'group_id' => $request->group_id,
        'user_id' => auth()->user()->id,
    ]);
})->middleware('auth');

Route::post('/api/new-group', function (Request $request) {
    return Group::create([
        'name' => $request->name,
        'user_id' => auth()->user()->id,
    ]);
})->middleware('auth');

Route::view('/{any}', 'root')->where('any', '.*')->middleware('auth');
