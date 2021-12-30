@extends('myLayout.app')

@section('content')
    <!-- Business Info and owner -->
    <section class="p-md-5 py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Owners business -->
                <div class="col-md">
                    <div class="row g-4">

                        <!-- Owners business -->
                        <div class="col-md">
                            <img
                                src="{{ asset('images/businesses/' . $business->business_image) }}"
                                class="img-fluid"
                                alt="Business"
                            />
                            <p class="h3 my-2">{{ $business->business_name }}</p>
                            <!-- Business brief -->
                            <h6 class="mt-4"><u>Business Brief</u></h6>
                            <p>{{ $business->business_brief }}</p>
                            <!-- Business description -->
                            <h6 class="mt-4"><u>Business Description</u></h6>
                            <p>{{ $business->business_description }}</p>
                            <!-- Business industry -->
                            <p class="text-capitalize"><strong>Industry:</strong> {{ $business_industry->industry }}</p>
                            <!-- Business location -->
                            <p class="text-capitalize"><strong>Location:</strong> {{ $business->business_location }}</p>
                            <!-- Update business button -->
                            <div class="mb-4">
                                <button
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateBusiness"
                                    class="btn lightColor text-white"
                                >
                                    Update Information <i class="bi bi-pencil-square"></i>
                                </button>
                            </div>

                            {{-- Status of business --}}
                            <div class="my-5">
                                @switch($business->accepted)
                                @case(2)
                                    <p class="colorLight"><strong>Business has been approved and published.</strong></p>
                                @break
                                @case(1)
                                    <p class="text-danger"><strong>Business has been rejected. Please check business content.</strong></p>
                                @break
                                @default
                                    <p class="text-secondary"><strong>Business is pending approval.</strong></p>
                                @endswitch
                                <form action="/profile/my_business/{{ $business->id }}" method="POST" onclick="return confirm('Delete business!')">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger text-white rounded-pill">Delete <i class="bi bi-trash"></i></button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            {{--                #######################################  --}}
            <!-- Owner details -->
                @include('myLayout.user_card')
            </div>
        </div>
    </section>


    <!-- Modal for updating business -->
    <div class="modal fade" id="updateBusiness" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Business</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <form
                        class="form"
                        action="/profile/my_business/{{ $business->id }}"
                        enctype="multipart/form-data"
                        method="POST"
                    >
                        @csrf
                        @method('put')
                        <div class="form-group mb-3">
                            <label>Business image</label>
                            <input
                                type="file"
                                class="form-control"
                                name="business_image"
                                id="business_image"
                            />
                        </div>

                        <div class="form-group mb-3">
                            <label>Business name</label>
                            <input
                                type="text"
                                name="business_name"
                                class="form-control"
                                id="business_name"
                                value="{{ $business->business_name }}"
                            />
                        </div>

                        <div class="form-group mb-3">
                            <label>Business description</label>
                            <small style="color: rgb(75, 0, 130)"
                            >(Let viewers know what your business is about)</small
                            >
                            <textarea
                                class="form-control"
                                name="business_description"
                                id="business_description"
                                rows="5"
                            >{{ $business->business_description }}</textarea
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label>Brief description of businesses</label>
                            <small style="color: rgb(75, 0, 130)"
                            >(This will be the first thing a user sees on the business
                                card)</small
                            >
                            <input
                                type="text"
                                maxlength="150"
                                name="business_brief"
                                id="business_brief"
                                class="form-control"
                                value="{{ $business->business_brief }}"
                            />
                            <small class="text-danger"
                            >Must not exceed 150 characters</small
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label>Industry</label>
                            <select
                                name="business_industry"
                                id="business_industry"
                                class="form-control text-capitalize"
                            >
                                @foreach($industries as $industry)
                                    <option value="{{ $industry['id'] }}" {{ $business->industry_id == $industry->id ? 'selected' : '' }}>{{ $industry['industry'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Location</label>

                            <input
                                type="text"
                                name="business_location"
                                class="form-control"
                                id="business_location"
                                value="{{ $business->business_location }}"
                            />
                        </div>

                        <div class="form-group mb-3">
                            <button class="btn lightColor text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    function validate_form() {
        var business_name = document.getElementById("business_name").value;
        var business_description = document.getElementById(
            "business_description"
        ).value;
        var business_brief = document.getElementById("business_brief").value;
        var business_industry = document.getElementById("business_industry").value;
        var business_location = document.getElementById("business_location").value;

        if (
            business_name.trim() == "" ||
            business_description.trim() == "" ||
            business_brief.trim() == ""
        ) {
            alert("All fields must be filled!");
            return false;
        }
        return true;
    }

    function validate_edit_profile() {
        var first_name = document.getElementById("first_name").value;
        var last_name = document.getElementById("last_name").value;
        var phone = document.getElementById("phone").value;
        var email = document.getElementById("email").value;

        if (
            first_name.trim() == "" ||
            last_name.trim() == "" ||
            phone.trim() == "" ||
            email.trim() == ""
        ) {
            alert("Profile information can not be blank!");
            return false;
        }
        return true;
    }
</script>
