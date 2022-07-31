<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.min.js" integrity="sha512-zjlf0U0eJmSo1Le4/zcZI51ks5SjuQXkU0yOdsOBubjSmio9iCUp8XPLkEAADZNBdR9crRy3cniZ65LF2w8sRA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font m plus c1 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700;800&family=Raleway:wght@300;400;500;600;700;900&family=Square+Peg&family=Vidaloka&display=swap" rel="stylesheet">

</head>

<body>
    <div id="app">

        <div class="sidebar">
            <div class="logo-details">
                <a class="text-decoration-none" href="/">
                    <div class="logo_name">
                        <img class="m-3 mt-4" width="130" src="{{asset('img/logo-deliveroo.png')}}" alt="">
                    </div>
                </a> <i class='bx bx-menu' id="btn"></i>
            </div>
            <ul class="nav-list">

                <li>
                    @php
                    use Illuminate\Support\Facades\Auth;
                    $restaurant = Auth::user()->restaurant;
                    @endphp
                    @if($restaurant)
                    <a href="/">
                        <i class="fa-solid fa-house"></i>
                        <span class="links_name">Home</span>
                    </a>
                    @else
                    <a href="/">
                        <i class="fa-solid fa-house"></i>
                        <span class="links_name" style="color: #878383">Home</span>
                    </a>
                    @endif
                    <span class="tooltip">Home</span>
                </li>

                <li>
                    @if($restaurant)
                    <a href="{{route('admin.charts.index')}}">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                    @else
                    <a href="#">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="links_name" style="color: #878383">Dashboard</span>
                    </a>
                    @endif
                    <span class="tooltip">Dashboard</span>
                </li>

                <li>
                    @if($restaurant)
                    <a href="{{route('admin.restaurants.index')}}">
                        <i class="fa-solid fa-utensils"></i>
                        <span class="links_name">Restaurant</span>
                    </a>
                    @else
                    <a href="#">
                        <i class="fa-solid fa-utensils"></i>
                        <span class="links_name" style="color: #878383">Restaurant</span>
                    </a>
                    @endif
                    <span class="tooltip">Restaurant</span>
                </li>


                <li>
                    @if($restaurant)
                    <a href="{{route('admin.dishes.index')}}">
                        <i class="fa-solid fa-burger"></i>
                        <span class="links_name">Dishes</span>
                    </a>
                    @else
                    <a href="#">
                        <i class="fa-solid fa-burger"></i>
                        <span class="links_name" style="color: #878383">Dishes</span>
                    </a>
                    @endif
                    <span class="tooltip">Dishes</span>
                </li>


                <li>
                    @if($restaurant)
                    <a href="{{route('admin.orders.index')}}">
                        <i class="fa-solid fa-dolly"></i>
                        <span class="links_name"> Orders</span>
                    </a>
                    @else
                    <a href="#">
                        <i class="fa-solid fa-dolly"></i>
                        <span class="links_name" style="color: #878383"> Orders</span>
                    </a>
                    @endif
                    <span class="tooltip">Orders</span>
                </li>

                <li class="profile">
                    <div class="profile-details">
                        <img src="https://flyclipart.com/thumb2/boss-circle-man-person-profile-staff-user-icon-133441.png" alt="profileImg">
                        <div class="name_job">
                            <div class="name">{{ Auth::user()->name }}</div>
                            <div class="job">Admin Profile</div>
                        </div>
                    </div>

                    <a href="{{ route('logout') }}" class="mt-5" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class='bx bx-log-out' id="log_out"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>
            </ul>
        </div>
        <section class="home-section">
            @yield('content')
        </section>

    </div>

</body>

</html>