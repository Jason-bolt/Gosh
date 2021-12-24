@extends('myLayout.app')

@section('content')
    <!-- Banner -->
    <section
        style="
            background-image: url('{{ asset("images/default/banner5.jpg") }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 70vh;
            "
    ></section>

    <!-- Category display -->
    <section class="p-md-5 py-4">
        <div class="container text-center text-sm-start">
            <h1>Welcome to GoSH</h1>
            <p class="m-0 mt-1">
                GoSH stands for GotSkillsHub and is an online business/skills hub that
                allows individuals with businesses or skills of any kind to reach the
                large audience of possible customers on the internet. Using GoSH will
                expose you to a vast number of businesses and entrepreneurs on the
                platform.
            </p>
        </div>
    </section>

    <!-- Short advert -->
    <section class="p-md-5 py-4 lightColor text-white">
        <div class="container">
            <p class="lead text-center">
                Can you write, code, design a flier or a logo, teach, develop a
                website, cook, or have a transactable skill and want to get your
                business out there, then look no further than
                <strong>gotskillshub.com</strong>.
            </p>
        </div>
    </section>

    <!-- Industries -->
    <section class="p-md-5 py-4">
        <div class="container">
            <h2 class="mb-4">Industries</h2>
            <div class="row g-3">
                <div class="col-md text-center">
                    <img src="{{ asset('images/svgs/art.svg') }}" class="img-fluid" alt="art" width="150"/>
                    <p class="lead">Art</p>
                </div>
                <div class="col-md text-center">
                    <img
                        src="{{ asset('images/svgs/buySell.svg') }}"
                        class="img-fluid"
                        alt="trade"
                        width="150"
                    />
                    <p class="lead">Trade</p>
                </div>
                <div class="col-md text-center">
                    <img
                        src="{{ asset('images/svgs/code.svg') }}"
                        class="img-fluid"
                        alt="code"
                        width="150"
                    />
                    <p class="lead">IT</p>
                </div>
                <div class="col-md text-center">
                    <img
                        src="{{ asset('images/svgs/writer.svg') }}"
                        class="img-fluid"
                        alt="literature"
                        width="150"
                    />
                    <p class="lead">Literature</p>
                </div>
                <div class="col-md text-center">
                    <img
                        src="{{ asset('images/svgs/cook.svg') }}"
                        class="img-fluid"
                        alt="food"
                        width="150"
                    />
                    <p class="lead">Food</p>
                </div>
            </div>
            <a href="{{ route('businesses') }}" class="btn lightColor text-white"
            >And much more <i class="bi bi-chevron-right"></i
                ></a>
        </div>
    </section>

    <hr class="w-50 m-auto"/>

    <!-- Recently added businesses -->
    <section class="p-md-5 py-4">
        <div class="container">
            <h3 class="mb-4">Recently Added Businesses</h3>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <img src="{{ asset('images/default/business_image25.jpeg') }}" alt="Business"/>
                        <div class="card-body text-center">
                            <div class="card-title">Name of Business</div>
                            <a href="" class="lightColor text-white btn rounded-pill"
                            >View details</a
                            >
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <img src="{{ asset('images/default/business_image25.jpeg') }}" alt="Business"/>
                        <div class="card-body text-center">
                            <div class="card-title">Name of Business</div>
                            <a href="#" class="lightColor text-white btn rounded-pill"
                            >View details</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- See other businesses -->
    <section class="pb-5">
        <div class="container">
            <a href="{{ route('businesses') }}" class="btn lightColor text-white"
            >Browse businesses <i class="bi bi-chevron-right"></i
                ></a>
        </div>
    </section>

@endsection
