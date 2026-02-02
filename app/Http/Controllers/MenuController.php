<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $coffeeItems = Menu::where('category', 'coffee')->get();
        $teaItems = Menu::where('category', 'tea')->get();

        return view('menu.index', compact(
            'coffeeItems',
            'teaItems'
        ));
    }
}