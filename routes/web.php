<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $featuredItems = [];
    return view('home', compact('featuredItems'));
});

Route::get('/menu', function () {
    $coffeeItems = [];
    $teaItems = [];
    return view('menu.index', compact('coffeeItems', 'teaItems'));
});

Route::get('/menu/detail', function () {
    return view('menu.show');
});

Route::get('/order', function () {
    return view('order.form');
});

Route::get('/reservation', function () {
    return view('reservation');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
