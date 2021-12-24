<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Got skills hub</title>

    <link
        rel="stylesheet"
        href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}"
    />
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
                                <button class="btn nav-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Search bar -->
<section class="shadow {{ $page == 'faq' || $page == 'terms' ? 'd-none' : '' }}">
    <div class="container py-3 text-center">
        <form class="row">
            <div class="col-lg-8 col-md-10 m-auto">
                <div class="row g-2">
                    <div class="col">
                        <input
                            type="text"
                            class="form-control"
                            id="search_query"
                            name="search_query"
                            placeholder="Search for business..."
                        />
                    </div>
                    <div class="col-sm-auto">
                        <button
                            type="button"
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
                <a href="#" style="color: #7f599b">Terms and conditions</a>
                <br />
                <a href="#" style="color: #7f599b">FAQs</a>
            </div>
            <div class="col-md-5">
                <h4>Contact Info</h4>
                <span style="color: #7f599b"
                ><i class="bi bi-telephone-fill"></i> +233209544918</span
                >
                <br />
                <span style="color: #7f599b"
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
</body>
</html>
