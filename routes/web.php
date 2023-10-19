<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ajax', [App\Http\Controllers\AjaxController::class, 'index']);
// Route::get('/sftp', [App\Http\Controllers\SftpController::class, 'index'])->name('sftp.index');
// Route::get('/sftp/{file}', [App\Http\Controllers\SftpController::class, 'show'])->name('sftp.show');

Route::resource('users', App\Http\Controllers\UsersController::class);
Route::resource('satker', App\Http\Controllers\SatkerController::class);
Route::resource('bku', App\Http\Controllers\BkuController::class);
Route::resource('sftp', App\Http\Controllers\SftpController::class);
Route::resource('tes', App\Http\Controllers\TesController::class);
