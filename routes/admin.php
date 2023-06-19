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
Route::get('/country', App\Http\Livewire\Admin\Country\Index::class)->name('admin.country');
Route::get('/city', App\Http\Livewire\Admin\City\Index::class)->name('admin.city');
Route::get('/univercity', App\Http\Livewire\Admin\Univercity\Index::class)->name('admin.univercity');
