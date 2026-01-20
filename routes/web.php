Route::get('/', function () {
    return view('home');
});

Route::get('/menu', function () {
    return view('menu.index');
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
