<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/www', function () {
        return view('main');
    })->name('ww');
});

    Route::get('/manage', function () {
        return view('main');
    })->name('dashboard');
