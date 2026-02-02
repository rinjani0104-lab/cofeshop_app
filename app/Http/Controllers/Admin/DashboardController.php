<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $topItems = [];        // menu terlaris
        $recentOrders = [];
        $todayReservations = [];    // pesanan terbaru

        return view('admin.dashboard', compact(
            'topItems',
            'recentOrders',
            'todayReservations'
        ));
    }
}

?>