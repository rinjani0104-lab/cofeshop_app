<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/home', function () {
    $featuredItems = [];
    return view('home', compact('featuredItems'));
});

Route::get('/menu', function () {
    $coffeeItems = App\Models\Menu::where('category', 'coffee')->get();
    $teaItems = App\Models\Menu::where('category', 'tea')->get();
    return view('menu.index', compact('coffeeItems', 'teaItems'));
});

Route::get('/order/form', function () {
    return view('order.form');
});

Route::get('/reservation', function () {
    return view('reservation');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function(){
    return view('auth.login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin/dasboard', function(){
        return view('admin.dashboard');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
