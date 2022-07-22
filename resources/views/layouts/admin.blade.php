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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div id="app">

        <div class="sidebar">
            <div class="logo-details">
                <i class='bx bxl-c-plus-plus icon'></i>
                <div class="logo_name">Deliveboo</div>
                <i class='bx bx-menu' id="btn"></i>
            </div>
            <ul class="nav-list">
                <li>
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Search...">
                    <span class="tooltip">Search</span>
                </li>

                <li>
                    @php 
                    use Illuminate\Support\Facades\Auth;
                    $restaurant = Auth::user()->restaurant; 
                    @endphp
                    @if($restaurant)
                    <a href="{{route('admin.home')}}">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                    @else 
                    <a href="#">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name" style="color: #878383">Dashboard</span>
                    </a>
                    @endif
                    <span class="tooltip">Dashboard</span>
                </li>

                <li>
                    @if($restaurant)
                    <a href="{{route('admin.restaurants.index')}}" aria-disabled="">
                        <i class='bx bx-user'></i>
                        <span class="links_name" >User</span>
                    </a>
                    @else
                    <a href="#" aria-disabled="">
                        <i class='bx bx-user'></i>
                        <span class="links_name" style="color: #878383">User</span>
                    </a>
                    @endif
                    <span class="tooltip" >User</span>
                </li>


                <li>
                    @if($restaurant)
                    <a href="{{route('admin.restaurants.index')}}" >
                        <i class='bx bx-chat'></i>
                        <span class="links_name">Restaurant</span>
                    </a>
                    @else
                    <a href="#" >
                        <i class='bx bx-chat'></i>
                        <span class="links_name" style="color: #878383">Restaurant</span>
                    </a>
                    @endif
                    <span class="tooltip">Restaurant</span>
                </li>


                <li>
                    @if($restaurant)
                    <a href="{{route('admin.dishes.index')}}">
                        <i class='bx bx-folder'></i>
                        <span class="links_name" >Dishes</span>
                    </a>
                    @else
                    <a href="#">
                        <i class='bx bx-folder'></i>
                        <span class="links_name" style="color: #878383">Dishes</span>
                    </a>
                    @endif
                    <span class="tooltip">Dishes</span>
                </li>


                <li>
                    @if($restaurant)
                    <a href="{{route('admin.orders.index')}}">
                        <i class='bx bx-chat'></i>
                        <span class="links_name"> Orders</span>
                    </a>
                    @else
                    <a href="#">
                        <i class='bx bx-chat'></i>
                        <span class="links_name" style="color: #878383"> Orders</span>
                    </a>
                    @endif
                    <span class="tooltip">Orders</span>
                </li>


                <li>
                    <a href="#">
                        <i class='bx bx-cog'></i>
                        <span class="links_name">Setting</span>
                    </a>
                    <span class="tooltip">Setting</span>
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