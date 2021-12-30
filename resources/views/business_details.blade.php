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
                            src="{{ asset('images/businesses/' . $business->business_image) }}"
                            class="img-fluid"
                            alt="business"
                        />
                        <div class="card-body">
                            <div class="card-tilte">
                                <h5>{{ $business->business_name }}</h5>
                            </div>
                            <div class="card-text">
                                <p>{{ $business->business_brief }}</p>
                                <p>{{ $business->business_description }}</p>
                                <p class="mb-0 text-capitalize"><strong>Industry: </strong>{{ $industry }}</p>
                                <p class="text-capitalize"><strong>Location: </strong>{{ $business->business_location }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Owner details -->
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <img
                            @if ($owner->image == 'null')
                                src="{{ asset('images/default/default_image.png') }}"
                            @else
                                src="{{ asset('images/businesses/' . $owner->image) }}"
                            @endif
                            class="img-fluid rounded mx-auto mt-2"
                            alt="User"
                            width="190"
                        />
                        <div class="card-body">
                            <div class="card-tile">
                                <p class="h5">{{ $owner->first_name . ' ' . $owner->last_name }}</p>
                            </div>
                            <div class="card-text mt-3">
                                @if(!empty(json_decode($skills)))
                                    <h6>Skills</h6>
                                @endif
                                @foreach($skills as $skill)
                                    <p class="mb-0 text-capitalize">{{ $skill->skill }}</p>
                                @endforeach

                                <!-- Contact info -->
                                <div class="mt-4">
                                    <p class="mb-0">
                                        <i class="bi bi-envelope"></i>
                                        <small>{{ $owner->email }}</small>
                                    </p>
                                    <p class="mb-0">
                                        <i class="bi bi-telephone"></i> <small>{{ $owner->phone }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(\Illuminate\Support\Facades\Auth::user() !== null && \Illuminate\Support\Facades\Auth::user()->isAdmin('1'))
        <section class="py-5">
            <div class="container">
                @if($business->accepted == 2) {{-- Business approved --}}
                    <a href="/businesses/{{ $business->id }}/decline" class="btn btn-danger rounded-pill">Decline</a>
                @elseif($business->accepted == 1) {{-- Business declined --}}
                    <a href="/businesses/{{ $business->id }}/approve" class="btn lightColor text-white rounded-pill">Approve</a>
                @else {{-- Pending approval --}}
                    <a href="/businesses/{{ $business->id }}/approve" class="btn lightColor text-white rounded-pill">Approve</a>
                    <a href="/businesses/{{ $business->id }}/decline" class="btn btn-danger rounded-pill">Decline</a>
                @endif
            </div>
        </section>
    @endif

    @if(!empty(json_decode($other_businesses)))
        <!-- Other services by owner -->
        <section class="p-md-5 py-5">
            <div class="container">
                <h4 class="mb-4">Other service(s) from owner</h4>
                <div class="row g-4">
                    @foreach($other_businesses as $other_business)
                        <div class="col-lg-3 col-md-6">
                            <div class="card    ">
                                <img src="{{ asset('images/businesses/' . $other_business->business_image) }}" alt="{{ $other_business->business_name }}" style="height: 200px;" />
                                <div class="card-body text-center">
                                    <div class="card-title"><strong>{{ $other_business->business_name }}</strong></div>
                                    <p class="card-text">{{ substr($other_business->business_brief, 0, 50) . '...' }}</p>
                                    <a href="/businesses/{{ $other_business->id }}" class="lightColor text-white btn rounded-pill"
                                    >View details <i class="bi bi-chevron-right"></i></a
                                    >
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    <!-- Back to businesses -->
    @if(\Illuminate\Support\Facades\Auth::user() !== null && \Illuminate\Support\Facades\Auth::user()->isAdmin('1'))
        <section class="py-5">
            <div class="container">
                <a href="{{ $page == 'pending' ? route('businesses.pending') : route('businesses.approved') }}" class="btn lightColor text-white"
                ><i class="bi bi-chevron-left"></i> Back to businesses</a
                >
            </div>
        </section>
    @else
        <section class="py-5">
            <div class="container">
                <a href="{{ route('businesses') }}" class="btn lightColor text-white"
                ><i class="bi bi-chevron-left"></i> Back to businesses</a
                >
            </div>
        </section>
    @endif
@endsection
