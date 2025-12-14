<?php

use Illuminate\Support\Facades\Route;

// Главная: страны
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Страница пользователей
Route::get('/users', function () {
    return view('welcome');
})->name('users');