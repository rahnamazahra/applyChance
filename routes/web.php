<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', App\Http\Livewire\Site\Home\Index::class)->name('home');

Route::get('/register', App\Http\Livewire\Site\User\Register::class)->name('register');
Route::get('/login', App\Http\Livewire\Site\User\Login::class)->name('login');
Route::get('/logout', [HomeController::class,'logout'])->name('logout');
Route::get('/verify/{id}', App\Http\Livewire\Site\User\VerifyLogin::class)->name('verify');
