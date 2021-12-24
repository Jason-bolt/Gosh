@extends('myLayout.app')

@section('content')
    <!-- Selector -->
    <section class="pt-5">
        <div class="container">
            <form action="#" class="row">
                <div class="col-lg-6 col-md-9">
                    <select class="form-control" name="industry" id="industry">
                        <option value="0">All Industries</option>
                        <option value="1">Food service</option>
                        <option value="2">Advertisement, media and communication</option>
                        <option value="3">Entertainment, events and sports</option>
                        <option value="4">Healthcare</option>
                        <option value="5">Hospitality, hostel and hotel</option>
                        <option value="6">IT and telecoms</option>
                        <option value="7">Retail, fashion and FMCG</option>
                        <option value="8">Education</option>
                        <option value="9">Writing and translation</option>
                    </select>
                </div>
            </form>
        </div>
    </section>

    <!-- Business Cards -->
    <section class="p-md-5 py-4">
        <div class="container">
            <h3 class="mb-4">Recently Added Businesses</h3>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm">
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
                    <div class="card shadow-sm">
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
@endsection
