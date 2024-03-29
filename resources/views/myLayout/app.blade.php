<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GOSH - {{ $page }}</title>
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/default/new_brand_logo.png') }}"/>

    <link
        rel="stylesheet"
        href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link
        rel="stylesheet"
        href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.css') }}"
    />
    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.js') }}"></script>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css"
        integrity="sha384-7ynz3n3tAGNUYFZD3cWe5PDcE36xj85vyFkawcF6tIwxvIecqKvfwLiaFdizhPpN"
        crossorigin="anonymous"
    />

    {{--      IziToast Link --}}
    <link rel="stylesheet" href="{{ asset('iziToast/css/iziToast.min.css') }}">
    <script src="{{ asset('iziToast/js/iziToast.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}" />
</head>
<body>
<header>
    <nav class="navbar-expand-md navbar navbar-dark deepColor fixed-top">
        <div class="container">
            <a href="index.html" class="navbar-brand">
                <img
                    src="{{ asset('images/default/brand_logo1.png') }}"
                    width="25"
                    height="25"
                    alt="GOSH"
                    class="d-inline-block"
                />
                GotSkillsHub
            </a>

            <button
                type="button"
                class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navMenu"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    @if(\Illuminate\Support\Facades\Auth::user() !== null && \Illuminate\Support\Facades\Auth::user()->isAdmin('1'))
                        <li class="nav-item">
                            <a href="{{ route('businesses.pending') }}" class="nav-link {{ $page == 'pending' ? 'active' : '' }}">Pending Businesses</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('businesses.approved') }}" class="nav-link {{ $page == 'approved' ? 'active' : '' }}">Approved Businesses</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('post')
                                <button class="btn nav-link pb-0 pt-1.5">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ $page == 'home' ? 'active' : '' }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('businesses') }}" class="nav-link {{ $page == 'businesses' ? 'active' : '' }}">Businesses</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link {{ $page == 'contact' ? 'active' : '' }}">Contact</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('profile') }}" class="nav-link {{ $page == 'profile' ? 'active' : '' }}">Profile</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                            </li>
                        @endauth
                        @auth
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <button class="btn nav-link pb-0 pt-1.5">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endauth
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Search bar -->
<section class="shadow {{ $page == 'faq' || $page == 'terms' ? 'd-none' : '' }}">
    <div class="container py-3 text-center">
        <form class="row" action="{{ route('search') }}" method="GET">
            @csrf
            @method('get')
            <div class="col-lg-8 col-md-10 m-auto">
                <div class="row g-2">
                    <div class="col">
                        <input
                            type="text"
                            class="form-control"
                            id="search_query"
                            name="search_query"
                            placeholder="Search for business..."
{{--                            value="{{ old('search_query') }}"--}}
                        />
                    </div>
                    <div class="col-sm-auto">
                        <button
                            type="submit"
                            class="btn lightColor text-white text-capitalize"
                        >
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

    @yield('content')

<!-- Footer -->
<footer class="deepColor text-white py-5 p-sm-5">
    <div class="container">
        <div class="row mx-auto">
            <div class="col-md-5 mb-3">
                <h4>Helpful Links</h4>
                <a href="{{ route('404Page') }}" style="color: #debbff">Terms and conditions</a>
                <br />
                <a href="{{ route('404Page') }}" style="color: #debbff">FAQs</a>
            </div>
            <div class="col-md-5">
                <h4>Contact Info</h4>
                <span style="color: #debbff"
                ><i class="bi bi-telephone-fill"></i> +233209544918</span
                >
                <br />
                <span style="color: #debbff"
                ><i class="bi bi-envelope-fill"></i> info@gotskillshub.com</span
                >
            </div>
        </div>
    </div>
</footer>

<section class="text-white deepColor">
    <div class="container">
        <p class="text-center m-0 pb-2">Copyright &copy; GotSkillsHub 2022</p>
    </div>
</section>

{{-- Toast --}}
<script>
    @if (session('success'))
    iziToast.success({
        // theme: 'dark',
        title: 'Great',
        message: '{{ session('success') }}',
        position: 'bottomRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
        backgroundColor: '#4b0082',
        progressBarColor: 'rgb(255,255,255)',
        titleColor: '#ffffff',
        messageColor: '#ffffff',
    });
    @endif

    @if (session('notice'))
    iziToast.success({
        // theme: 'dark',
        message: '{{ session('notice') }}',
        position: 'bottomRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
        backgroundColor: '#4b0082',
        progressBarColor: 'rgb(255,255,255)',
        titleColor: '#ffffff',
        messageColor: '#ffffff',
    });
    @endif

    @if ($errors->any())
    iziToast.error({
        // theme: 'dark',
        title: 'Fail',
        message: 'Invalid input, try again.',
        position: 'bottomRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
        progressBarColor: 'rgb(255,255,255)',
        titleColor: '#ffffff',
        messageColor: '#ffffff',
    });
    @endif

</script>

</body>
</html>


