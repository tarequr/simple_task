<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;

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
    $notes = App\Models\Note::orderBy('id','desc')->get();
    return view('welcome',compact('notes'));
});

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('notes', NoteController::class)->except('show');
});