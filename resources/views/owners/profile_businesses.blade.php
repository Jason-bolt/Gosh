@extends('myLayout.app')

@section('content')
    <!-- Business Info and owner -->
    <section class="p-md-5 py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Owners business -->
                <div class="col-md">
                    <h3 class="mb-4">My businesses</h3>
                    <div class="row g-4">

                        @forelse($user->user_businesses as $business)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card shadow-sm hover:bg-gray-700">
                                    <img
                                        src="{{ asset('images/businesses/' . $business['business_image']) }}"
                                        class="img-fluid"
                                        alt="Business"
                                    />
                                    <div class="card-body text-center">
                                        <div class="card-title">Name of Business</div>
                                        <a href="/profile/my_business/{{ $business['id'] }}" class="lightColor text-white btn rounded-pill"
                                        >View details</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <!-- No business added -->
                            <p class="lead my-5">No business added yet.</p>
                        @endforelse

                    </div>
                    <!-- Add business button -->
                    <div class="mt-5">
                        <button
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#addBusiness"
                            class="btn text-white lightColor mb-4"
                        >
                            Create Business <i class="bi bi-plus-lg"></i>
                        </button>
                    </div>
                    <!-- Business form -->
                    <div class="collapse mt-4" id="addBusiness">
                        <h4 class="mb-2">Business Form</h4>
                        <form
                            class="form mb-5"
                            onsubmit="return validate_form()"
                            action="{{ route('add_business') }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @method('post')
                            <div class="form-group mb-3">
                                <label>Business image *</label>
                                <small style="color: rgb(75, 0, 130)">
                                    (This should represent your business)</small
                                >
                                <input
                                    type="file"
                                    accept="image/*"
                                    id="business_image"
                                    name="business_image"
                                    class="form-control"
                                    required
                                />
                                @if ($errors->has('business_image'))
                                    <small class="text-danger">{{ $errors->first('business_image') }}</small>
                                @endif


                                <small></small>
                            </div>

                            <div class="form-group mb-3">
                                <label>Business name *</label>
                                <input
                                    type="text"
                                    maxlength="50"
                                    name="business_name"
                                    id="business_name"
                                    class="form-control"
                                    required
                                />
                                @if ($errors->has('business_name'))
                                    <small class="text-danger">{{ $errors->first('business_name') }}</small>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Business description *</label>
                                <small style="color: rgb(75, 0, 130)"
                                >(Let viewers know what your business is about)</small
                                >
                                <textarea
                                    name="business_description"
                                    id="business_description"
                                    class="form-control"
                                    rows="5"
                                    required
                                ></textarea>
                                @if ($errors->has('business_description'))
                                    <small class="text-danger">{{ $errors->first('business_description') }}</small>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Business brief *</label>
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
                                    required
                                />
                                <small class="text-danger"
                                >Must not exceed 150 characters</small
                                >
                                @if ($errors->has('business_brief'))
                                    <small class="text-danger">{{ $errors->first('business_brief') }}</small>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Industry *</label>
                                <select
                                    class="form-control text-capitalize"
                                    name="business_industry"
                                    id="business_industry"
                                    required
                                >
                                    @foreach($industries as $industry)
                                        <option value="{{ $industry['id'] }}">{{ $industry['industry'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Location *</label>
                                <input
                                    type="text"
                                    name="business_location"
                                    id="business_location"
                                    class="form-control"
                                    placeholder="Business location"
                                    required
                                />
                                <small style="color: #999"
                                >e.g. Amamoma, Ghana; Cape coast, Ghana; Texas, USA; Lagos,
                                    Nigeria; etc (Try to be as specific as possible.)</small
                                >
                                @if ($errors->has('business_location'))
                                    <small class="text-danger">{{ $errors->first('business_location') }}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn lightColor text-white mt-3">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
{{--                #######################################  --}}
                <!-- Owner details -->
                @include('myLayout.user_card')
            </div>
        </div>
    </section>
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
            business_name.trim() === "" ||
            business_description.trim() === "" ||
            business_brief.trim() === ""
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
            first_name.trim() === "" ||
            last_name.trim() === "" ||
            phone.trim() === "" ||
            email.trim() === ""
        ) {
            alert("Profile information can not be blank!");
            return false;
        }
        return true;
    }
</script>
