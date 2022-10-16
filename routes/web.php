<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuestionController;

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

Route::middleware(['auth', 'isAuth'])->group(function () {
	Route::get('/', function () {
		return view('pages.home.home');
	});

	Route::get('/questions/{type}', [QuestionController::class, 'Index'])->name('questions');
	Route::post('/questions/save', [QuestionController::class, 'save'])->name('questions-post');

	Route::get('/user/result', [UsersController::class, 'Result'])->name('result');
	Route::get('/testImg', [QuestionController::class, 'createDiplom'])->name('create');
});
require __DIR__ . '/auth.php';
