@extends('layouts.admin')
@section('content')

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                   <a href="{{ route('home') }}">
                        <span class="icon">
                            <ion-icon name="home"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('all.bookings') }}">
                        <span class="icon">
                            <ion-icon name="calendar-outline"></ion-icon>
                        </span>
                        <span class="title">Bookings</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admins.help') }}">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('all.admins') }}">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Account</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('all.products') }}">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Products</span>
                    </a>
                </li>
                 <li>
                <a href="{{ route('staff.sell.form') }}">
                    <span class="icon">
                        <ion-icon name="cash-outline"></ion-icon>
                    </span>
                    <span class="title">Sell Product</span>
                </a>
            </li>
               <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
         
            </ul>
        </div>
        

        <!-- ========================= Main ==================== -->
        {{-- <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="{{ asset('assets/images/IMG_8364.JPG') }}" alt="">

                </div>
            </div> --}}

            <!-- ======================= Cards ================== -->

<div class="cardBox">
    <a href="{{ route('all.bookings') }}" class="card">
        <div>
            <div class="numbers">{{ $usersCount }}</div>
            <div class="cardName">Total Users</div>
        </div>
        <div class="iconBx">
            <ion-icon name="people-outline"></ion-icon>
        </div>
    </a>

    <a href="{{ route('all.bookings') }}" class="card">
        <div>
            <div class="numbers">{{ $productsCount }}</div>
            <div class="cardName">Total Bookings</div>
        </div>
        <div class="iconBx">
            <ion-icon name="calendar-outline"></ion-icon>
        </div>
    </a>

    <a href="{{ route('all.orders') }}" class="card">
        <div>
            <div class="numbers">{{ $ordersCount }}</div>
            <div class="cardName">Total Orders</div>
        </div>
        <div class="iconBx">
            <ion-icon name="cart-outline"></ion-icon>
        </div>
    </a>

    <a href="{{ route('all.bookings') }}" class="card">
        <div>
            <div class="numbers">${{ $earning }}</div>
            <div class="cardName">Total Earnings</div>
        </div>
        <div class="iconBx">
            <ion-icon name="cash-outline"></ion-icon>
        </div>
    </a>
</div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
             <div class="recentOrders">
    <div class="cardHeader">
        <h2>Recent Orders</h2>
        <a href="{{ route('all.orders') }}" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Product</td>
                <td>Price</td>
                <td>Payment</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            @forelse($recentOrders as $order)
            <tr>
                <td>{{ $order->product->name ?? 'N/A' }}</td>
                <td>${{ $order->price }}</td>
                <td>{{ $order->payment_status ?? 'Pending' }}</td>
                <td><span class="status {{ strtolower($order->status) }}">{{ $order->status }}</span></td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No recent orders</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

                <!-- ================= New Customers ================ -->
               <div class="recentOrders">
    <div class="cardHeader">
        <h2>Recent Orders</h2>
        <a href="{{ route('all.orders') }}" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Name</td>
                <td>Price</td>
                <td>Payment</td>
                <td>Status</td>
            </tr>
        </thead>

        <tbody>
            {{-- @foreach($recentOrders as $order)
                <tr>
                    <td>{{ $order->last_name }}</td>
                    <td>${{ $order->price }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>
                        <span class="status {{ strtolower($order->status) }}">
                            {{ $order->status }}
                        </span>
                    </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
</div>

            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>


@endsection