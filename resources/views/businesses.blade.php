@extends('myLayout.app')

@section('content')
    <!-- Selector -->
    <section class="pt-5">
        <div class="container">
            <form action="#" class="row">
                <div class="col-lg-6 col-md-9">
                    <select class="form-control text-capitalize" name="industry" id="industry" onselect="fetchBusinesses()">
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}">{{ $industry->industry }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </section>

    <!-- Business Cards -->
    <section class="p-md-5 py-4">
        <div class="container">
            @if(!isset($query))
                <h3 class="mb-4">Recently Added Businesses</h3>
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

    <script>
        $(document).ready(function () {

            $("#industry").change(function () {
                console.log($(this).val());
                $.ajax({
                    url: "{{ route }}"
                });
            });

            function fetchBusinesses(industry)
            {
                $.ajax({
                    type: "GET",
                    url: "/businesses/" + industry,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                    }
                });
            }

        });
    </script>


@endsection
