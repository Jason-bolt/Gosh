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
                @forelse($businesses as $business)
                    <div class="col-lg-3 col-md-6">
                        <div class="card hover:text-gray-100 shadow-sm">
                            <img src="{{ asset('images/businesses/' . $business->business_image) }}" alt="Business" style="height: 200px;" />
                            <div class="card-body text-center">
                                <div class="card-title"><strong>{{ $business->business_name }}</strong></div>
                                <p class="card-text">
                                    {{ substr($business->business_brief, 0, 50) . '...' }}
                                </p>
                                <a href="/businesses/{{ $business->id }}" class="lightColor text-white btn rounded-pill"
                                >View details <i class="bi bi-chevron-right"></i></a
                                >
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="my-5">No businesses added yet.</p>
                @endforelse

            </div>
        </div>
    </section>
@endsection
