<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/home', 'auth.home')->middleware('auth');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get(
    '/admin',
    [AdminController::class, 'index']
)->name('admin.index');

Route::match(['GET', 'POST'], '/', [ContactController::class, 'index'])->name('contact.index');

Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

Route::post('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');

Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
