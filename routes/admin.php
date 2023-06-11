<?php

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

Route::get('/', App\Http\Livewire\Admin\Home\Index::class)->name('admin.home');
Route::get('/login', App\Http\Livewire\Admin\User\Login::class)->name('login');
Route::get('/register', App\Http\Livewire\Admin\User\Register::class)->name('register');
