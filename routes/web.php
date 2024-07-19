<?php

use App\Events\SendMessage;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/show', [HomeController::class, 'show']);
Route::inertia('/add-user', 'User/Add');
Route::post('store-user', [HomeController::class, 'store']);

Route::get('chat', function () {
    return Inertia::render('chat');
});

Route::get('test', function() {
    broadcast(new SendMessage([
        "id" => 1,
        "message" => "tôi là test"
    ]));
});