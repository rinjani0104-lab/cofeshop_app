<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Menu;

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'show'])
->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout'])
->middleware('auth')
->name('logout');

Route::get('/', fn () => view('welcome'));

Route::get('/home', fn () => view('home', [
    'featuredItems' => [],
]));

Route::get('/menu', function () {
    $coffeeItems = Menu::where('category', 'coffee')->get();
    $teaItems = Menu::where('category', 'tea')->get();
    return view('menu.index', compact('coffeeItems', 'teaItems'));
});

Route::get('/order/form', fn () => view('order.form'));

Route::get('/reservation', fn () => view('reservation'));

Route::get('/about', fn() =>view('about'));

Route::get('/contact', fn () => view('contact'));

Route::middleware('auth')->group(function () {
    Route::get('/admin/dasboard', fn () => view('admin.dashboard'));
});