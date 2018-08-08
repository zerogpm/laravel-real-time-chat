<?php

use App\Task;
use App\Events\TaskCreated;
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

Route::get('/tasks', function () {
    return Task::latest()->pluck('body');
});

Route::post('/tasks', function () {
    $task = Task::forceCreate(request(['body']));
    event(new TaskCreated($task));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'Chat\ChatController@index')->name('chat');
Route::get('/chat/messages', 'Chat\ChatMessageController@index')->name('chat.message.index');
Route::post('/chat/messages', 'Chat\ChatMessageController@store')->name('chat.message.store');
