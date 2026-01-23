<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    // Common method to get featured items
    protected function getFeaturedItems()
    {
        return \App\Models\Menu::where('is_featured', true)->limit(4)->get();
    }
}