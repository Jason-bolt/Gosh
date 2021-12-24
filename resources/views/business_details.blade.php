@extends('myLayout.app')

@section('content')
    <!-- Business Info and owner -->
    <section class="p-md-5 py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Business details -->
                <div class="col-md">
                    <div class="card shadow-sm">
                        <img
                            src="{{ asset('images/default/business_image25.jpeg') }}"
                            class="img-fluid"
                            alt="business"
                        />
                        <div class="card-body">
                            <div class="card-tilte">
                                <h5>Name of Business</h5>
                            </div>
                            <div class="card-text">
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Dolor ipsa amet vel fugit repudiandae autem, corporis sunt
                                    quos animi ipsum.
                                </p>
                                <p class="mb-0"><strong>Industry: </strong>Industry</p>
                                <p><strong>Location: </strong>Location</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Owner details -->
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <img
                            src="{{ asset('images/default/default_image.png') }}"
                            class="img-fluid rounded mx-auto mt-2"
                            alt="User"
                            width="190"
                        />
                        <div class="card-body">
                            <div class="card-tile">
                                <p class="h5">Owner's name</p>
                            </div>
                            <div class="card-text mt-3">
                                <h6>Skills</h6>
                                <p class="mb-0">Skill</p>
                                <p class="mb-0">Skill</p>
                                <p class="mb-0">Skill</p>

                                <!-- Contact info -->
                                <div class="mt-4">
                                    <p class="mb-0">
                                        <i class="bi bi-envelope"></i>
                                        <small>example@email.com</small>
                                    </p>
                                    <p class="mb-0">
                                        <i class="bi bi-telephone"></i> <small>0123456789</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Other services by owner -->
    <section class="p-md-5 py-5">
        <div class="container">
            <h4 class="mb-4">Other service(s) from owner</h4>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <img src="{{ asset('images/default/business_image25.jpeg') }}" alt="Business" />
                        <div class="card-body text-center">
                            <div class="card-title">Name of Business</div>
                            <a href="#" class="lightColor text-white btn rounded-pill"
                            >View details</a
                            >
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <img src="{{ asset('images/default/business_image25.jpeg') }}" alt="Business" />
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

    <!-- Back to businesses -->
    <section class="py-5">
        <div class="container">
            <a href="#" class="btn lightColor text-white"
            ><i class="bi bi-chevron-left"></i> Back to businesses</a
            >
        </div>
    </section>
@endsection
