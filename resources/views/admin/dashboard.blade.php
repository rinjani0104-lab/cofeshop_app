@extends('layouts.app')

@section('title', 'Admin Dashboard - Cafein Holic')

@section('head')
    <style>
        /* Admin Dashboard Styles */
        .admin-sidebar {
            background: linear-gradient(180deg, var(--brown-dark) 0%, var(--brown) 100%);
            color: white;
            min-height: 100vh;
            position: fixed;
            width: 250px;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .admin-content {
            margin-left: 250px;
            transition: all 0.3s;
        }

        .sidebar-collapsed .admin-sidebar {
            width: 70px;
        }

        .sidebar-collapsed .admin-content {
            margin-left: 70px;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }

        .sidebar-menu .nav-link:hover,
        .sidebar-menu .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: white;
            border-left-color: var(--beige);
        }

        .sidebar-menu .nav-link i {
            width: 20px;
            text-align: center;
            margin-right: 10px;
        }

        .sidebar-collapsed .sidebar-menu .nav-link span {
            display: none;
        }

        .sidebar-collapsed .sidebar-menu .nav-link i {
            margin-right: 0;
            font-size: 1.2rem;
        }

        .admin-navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 999;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border-left: 4px solid var(--brown);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .stat-card.revenue .stat-icon {
            background: linear-gradient(135deg, #4CAF50, #8BC34A);
            color: white;
        }

        .stat-card.orders .stat-icon {
            background: linear-gradient(135deg, #2196F3, #03A9F4);
            color: white;
        }

        .stat-card.customers .stat-icon {
            background: linear-gradient(135deg, #FF9800, #FFC107);
            color: white;
        }

        .stat-card.menu .stat-icon {
            background: linear-gradient(135deg, #9C27B0, #E91E63);
            color: white;
        }

        .chart-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }

        .recent-orders {
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: var(--brown-dark);
            background: var(--cream);
        }

        .badge-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .badge-status.pending {
            background: #FFF3CD;
            color: #856404;
        }

        .badge-status.processing {
            background: #D1ECF1;
            color: #0C5460;
        }

        .badge-status.completed {
            background: #D4EDDA;
            color: #155724;
        }

        .badge-status.cancelled {
            background: #F8D7DA;
            color: #721C24;
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                width: 70px;
            }
            
            .admin-content {
                margin-left: 70px;
            }
            
            .sidebar-menu .nav-link span {
                display: none;
            }
            
            .sidebar-menu .nav-link i {
                margin-right: 0;
                font-size: 1.2rem;
            }
        }
    </style>
@endsection

@section('content')
<div class="admin-wrapper">
    <!-- Sidebar -->
    <nav class="admin-sidebar">
        <div class="sidebar-header">
            <h4 class="mb-0">
                <i class="bi bi-cup-hot-fill me-2"></i>
                <span class="sidebar-brand">Cafein Holic</span>
            </h4>
            <small class="text-beige">Admin Panel</small>
        </div>

        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/admin/dashboard') }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/orders') }}">
                        <i class="bi bi-cart3"></i>
                        <span>Orders</span>
                        <span class="badge bg-brown-light float-end">15</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/menu') }}">
                        <i class="bi bi-menu-button-wide"></i>
                        <span>Menu Items</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/reservations') }}">
                        <i class="bi bi-calendar-check"></i>
                        <span>Reservations</span>
                        <span class="badge bg-brown-light float-end">8</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/customers') }}">
                        <i class="bi bi-people"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/analytics') }}">
                        <i class="bi bi-graph-up"></i>
                        <span>Analytics</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <hr class="dropdown-divider">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/settings') }}">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-beige" href="{{ url('/') }}">
                        <i class="bi bi-house"></i>
                        <span>Back to Site</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="admin-content">
        <!-- Navbar -->
        <nav class="admin-navbar navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="btn btn-outline-brown" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                
                <div class="d-flex align-items-center ms-auto">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" 
                           id="userDropdown" data-bs-toggle="dropdown">
                            <div class="avatar me-2">
                                <div class="bg-brown text-cream rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 40px; height: 40px;">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            </div>
                            <div class="d-none d-md-block">
                                <span class="fw-medium">Admin User</span>
                                <small class="d-block text-muted">Administrator</small>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="container-fluid mt-4">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0 text-brown-dark">Dashboard</h1>
                    <p class="text-muted mb-0">Welcome back, Admin! Here's what's happening today.</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-brown">
                        <i class="bi bi-plus-circle me-2"></i> Add New Item
                    </button>
                    <button class="btn btn-outline-brown">
                        <i class="bi bi-download me-2"></i> Export Report
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card revenue">
                        <div class="stat-icon">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <h3 class="fw-bold">$2,845</h3>
                        <p class="text-muted mb-0">Today's Revenue</p>
                        <span class="text-success small">
                            <i class="bi bi-arrow-up-right me-1"></i> 12.5% from yesterday
                        </span>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card orders">
                        <div class="stat-icon">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <h3 class="fw-bold">156</h3>
                        <p class="text-muted mb-0">Today's Orders</p>
                        <span class="text-success small">
                            <i class="bi bi-arrow-up-right me-1"></i> 8.2% from yesterday
                        </span>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card customers">
                        <div class="stat-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h3 class="fw-bold">89</h3>
                        <p class="text-muted mb-0">New Customers</p>
                        <span class="text-success small">
                            <i class="bi bi-arrow-up-right me-1"></i> 5.7% from yesterday
                        </span>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card menu">
                        <div class="stat-icon">
                            <i class="bi bi-cup-hot"></i>
                        </div>
                        <h3 class="fw-bold">42</h3>
                        <p class="text-muted mb-0">Menu Items</p>
                        <span class="text-success small">
                            <i class="bi bi-plus-circle me-1"></i> 3 new this week
                        </span>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="row g-4 mb-4">
                <div class="col-lg-8">
                    <div class="chart-container">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0 fw-bold">Revenue Overview</h5>
                            <div class="dropdown">
                                <button class="btn btn-outline-brown btn-sm dropdown-toggle" type="button" 
                                        data-bs-toggle="dropdown">
                                    This Week
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <canvas id="revenueChart" height="250"></canvas>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chart-container">
                        <h5 class="fw-bold mb-4">Top Selling Items</h5>
                        <div class="list-group list-group-flush">
                            @foreach($topItems ?? [] as $item)
                            <div class="list-group-item border-0 px-0 py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-cream rounded-2 p-2 me-3">
                                            <i class="bi bi-cup-hot text-brown"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">{{ $item->name }}</h6>
                                            <small class="text-muted">{{ $item->orders }} orders</small>
                                        </div>
                                    </div>
                                    <span class="fw-bold text-brown">${{ number_format($item->revenue, 2) }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders & Reservations -->
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="recent-orders">
                        <div class="p-4 border-bottom">
                            <h5 class="mb-0 fw-bold">Recent Orders</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Items</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentOrders ?? [] as $order)
                                    <tr>
                                        <td class="fw-medium">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->item_count }} items</td>
                                        <td class="fw-bold">${{ number_format($order->total, 2) }}</td>
                                        <td>
                                            <span class="badge-status {{ $order->status }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-brown">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="p-3 border-top text-center">
                            <a href="{{ url('/admin/orders') }}" class="text-brown text-decoration-none">
                                View All Orders <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chart-container">
                        <h5 class="fw-bold mb-4">Today's Reservations</h5>
                        <div class="list-group list-group-flush">
                            @foreach($todaysReservations ?? [] as $reservation)
                            <div class="list-group-item border-0 px-0 py-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">{{ $reservation->customer_name }}</h6>
                                        <small class="text-muted">
                                            <i class="bi bi-clock me-1"></i>{{ $reservation->time }}
                                        </small>
                                        <div class="mt-1">
                                            <small class="text-muted">
                                                <i class="bi bi-people me-1"></i>{{ $reservation->guests }} guests
                                            </small>
                                        </div>
                                    </div>
                                    <span class="badge bg-cream text-brown-dark">{{ $reservation->table_type }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-3 text-center">
                            <a href="{{ url('/admin/reservations') }}" class="btn btn-outline-brown btn-sm">
                                View All Reservations
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar Toggle
            const sidebarToggle = document.getElementById('sidebarToggle');
            const adminWrapper = document.querySelector('.admin-wrapper');
            
            sidebarToggle.addEventListener('click', function() {
                adminWrapper.classList.toggle('sidebar-collapsed');
                
                // Save state to localStorage
                const isCollapsed = adminWrapper.classList.contains('sidebar-collapsed');
                localStorage.setItem('sidebarCollapsed', isCollapsed);
            });
            
            // Load sidebar state
            if (localStorage.getItem('sidebarCollapsed') === 'true') {
                adminWrapper.classList.add('sidebar-collapsed');
            }
            
            // Initialize Revenue Chart
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Revenue',
                        data: [1200, 1900, 1500, 2500, 2200, 3000, 2845],
                        borderColor: 'var(--brown)',
                        backgroundColor: 'rgba(92, 61, 46, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(60, 42, 33, 0.9)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: 'var(--beige)',
                            borderWidth: 1
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return '$' + value;
                                }
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            }
                        }
                    }
                }
            });
            
            // Update chart on window resize
            window.addEventListener('resize', function() {
                revenueChart.resize();
            });
            
            // Sample data for demonstration
            const topItems = [
                { name: "Artisan Cold Brew", orders: 45, revenue: 247.50 },
                { name: "Hazelnut Latte", orders: 38, revenue: 180.50 },
                { name: "Caramel Macchiato", orders: 32, revenue: 160.00 },
                { name: "Matcha Frappé", orders: 28, revenue: 175.00 }
            ];
            
            const recentOrders = [
                { id: 1001, customer_name: "John Doe", item_count: 3, total: 18.75, status: "completed" },
                { id: 1002, customer_name: "Jane Smith", item_count: 2, total: 12.50, status: "processing" },
                { id: 1003, customer_name: "Robert Brown", item_count: 4, total: 24.00, status: "pending" },
                { id: 1004, customer_name: "Lisa Wong", item_count: 1, total: 5.50, status: "completed" },
                { id: 1005, customer_name: "Mike Johnson", item_count: 2, total: 11.00, status: "completed" }
            ];
            
            const todaysReservations = [
                { customer_name: "Sarah Wilson", time: "10:00 AM", guests: 2, table_type: "Window" },
                { customer_name: "David Lee", time: "12:30 PM", guests: 4, table_type: "Family" },
                { customer_name: "Emily Chen", time: "2:00 PM", guests: 3, table_type: "Cozy Corner" },
                { customer_name: "Tom Harris", time: "4:30 PM", guests: 2, table_type: "Bar Counter" }
            ];
        });
    </script>
@endsection