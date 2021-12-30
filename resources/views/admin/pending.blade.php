@extends('myLayout.app')

@section('content')
    <!-- Selector -->
    <section class="pt-5">
        <div class="container">
            <form action="{{ route('industry_business') }}" method="POST" class="row text-center g-2 g-md-0">
                @csrf
                @method('post')
                <div class="col-lg-6 col-md-9">
                    <select class="form-control text-capitalize" name="industry_id" id="industry_id">
                        @foreach($industries as $industry)
                            @if(isset($selected_industry))
                                <option value="{{ $industry->id }}" {{ $industry->id == $selected_industry->id ? 'selected' : ''}}>{{ $industry->industry }}</option>
                            @else
                                <option value="{{ $industry->id }}">{{ $industry->industry }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 col-12 d-grid d-md-block">
                    <button type="submit" class="btn lightColor text-white px-4">Go</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Business Cards -->
    <section class="p-md-5 py-4">
        <div class="container">
            @if(!isset($query))
                @if(!isset($selected_industry))
                    <h3 class="mb-4">All Businesses</h3>
                @else
                    <h3 class="mb-4 text-capitalize">{{ $selected_industry->industry }}</h3>
                @endif
            @else
                <h3 class="mb-4">Results for query: <em>{{ $query }}</em></h3>
            @endif
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
                    @if(!isset($query))
                        <p class="my-5">No businesses added yet.</p>
                    @else
                        <p class="my-5">No businesses for search query: <em>{{ $query }}</em></p>
                    @endif
                @endforelse

            </div>
        </div>
    </section>

@endsection
