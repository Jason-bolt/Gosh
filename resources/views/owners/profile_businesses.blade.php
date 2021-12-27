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

{{--                        <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                            <div class="card shadow-sm">--}}
{{--                                <img--}}
{{--                                    src="{{ asset('images/default/business_image25.jpeg') }}"--}}
{{--                                    class="img-fluid"--}}
{{--                                    alt="Business"--}}
{{--                                />--}}
{{--                                <div class="card-body text-center">--}}
{{--                                    <div class="card-title">Name of Business</div>--}}
{{--                                    <a href="#" class="lightColor text-white btn rounded-pill"--}}
{{--                                    >View details</a--}}
{{--                                    >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    <!-- No business added -->
                    <p class="lead my-5">No business added yet.</p>

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
                            </div>

                            <div class="form-group mb-3">
                                <label>Industry *</label>
                                <select
                                    class="form-control"
                                    name="business_industry"
                                    id="business_industry"
                                    required
                                >
                                    <option value="1">Food service</option>
                                    <option value="2">
                                        Advertisement, media and communication
                                    </option>
                                    <option value="3">Entertainment, events and sports</option>
                                    <option value="4">Healthcare</option>
                                    <option value="5">Hospitality, hostel and hotel</option>
                                    <option value="6">IT and telecoms</option>
                                    <option value="7">Retail, fashion and FMCG</option>
                                    <option value="8">Education</option>
                                    <option value="9">Writing and translation</option>
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
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <img
                            src="{{ $user['image'] == 'null' ? asset('images/default/default_image.png') : asset('images/owners/' . $user['image']) }}"
                            class="img-fluid rounded-circle mx-auto mt-2"
                            alt="User"
                            width="190"
                        />

                        <div class="card-body">
                           @if($user['image'] != 'null')
                                <form action="{{ route('clear_image') }}" method="POST">
                                    @csrf
                                    <button class="btn lightColor text-white p-1 rounded-pill px-2"><small>Clear Image <i class="bi bi-image"></i></small></button>
                                </form>
                            @endif
                            <div class="card-tile">
                                <p class="h5">{{ $user['first_name'] . ' ' . $user['last_name']}}</p>
                            </div>
                            <!-- Contact info -->
                            <div class="mt-2">
                                <p class="mb-0">
                                    <i class="bi bi-envelope"></i>
                                    <small>{{ $user['email'] }}</small>
                                </p>
                                <p class="mb-0">
                                    <i class="bi bi-telephone"></i> <small>{{ $user['phone'] }}</small>
                                </p>
                            </div>
                            <!-- Edit Profile Button -->
                            <button
                                data-bs-target="#editProfile"
                                data-bs-toggle="collapse"
                                class="btn colorLight mt-2"
                                style="border: rgb(75, 0, 130) 1px solid"
                            >
                                Edit Profile <i class="bi bi-pen"></i>
                            </button>
                            <!-- Edit Profile Form -->
                            <div class="collapse my-3" id="editProfile">
                                <form
                                    onsubmit="return validate_edit_profile()"
                                    action="{{ route('edit_profile') }}"
                                    class="form"
                                    method="POST"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    @method('put')

                                    <div class="form-group mb-2">
                                        <label>Profile picture</label>
                                        <input
                                            type="file"
                                            class="form-control"
                                            accept="image/*"
                                            name="profile_image"
                                            id="profile_image"
                                        />
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>First name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="first_name"
                                            id="first_name"
                                            value="{{ $user['first_name'] }}"
                                            required
                                        />
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>Last name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="last_name"
                                            id="last_name"
                                            value="{{ $user['last_name'] }}"
                                            required
                                        />
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>Phone number</label>
                                        <input
                                            type="tel"
                                            class="form-control"
                                            name="phone"
                                            id="phone"
                                            value="{{ $user['phone'] }}"
                                        />
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>Email</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="email"
                                            id="email"
                                            value="{{ $user['email'] }}"
                                        />
                                    </div>

                                    <div class="form-group mb-2">
                                        <button class="btn lightColor text-white" type="submit">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <hr />
                            <!-- Skills -->
                            <div class="card-text mt-4">
                                <h6>Skills</h6>
                                <!-- Add Skill Button -->
                                <button
                                    data-bs-target="#addSkill"
                                    data-bs-toggle="collapse"
                                    class="btn colorLight my-2"
                                    style="border: rgb(75, 0, 130) 1px solid"
                                >
                                    Add skill <i class="bi bi-plus-lg"></i>
                                </button>
                                <div class="collapse mt-2" id="addSkill">
                                    <form action="{{ route('add_skill') }}" method="POST" class="mb-3">
                                        @csrf
                                        @method('post')
                                        <input
                                            type="text"
                                            name="skill"
                                            id="skill"
                                            class="form-control mb-2"
                                            placeholder="Baking, french language, fine art,..."
                                            required
                                        />
                                        <button class="btn text-white lightColor">Add</button>
                                    </form>
                                </div>
                                @forelse($skills as $skill)
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0">{{ $skill['skill'] }}</p>
                                        <form action="/delete_skill/{{ $skill['id'] }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn p-0">
                                                <i class="bi bi-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </div>
                                @empty
                                    <p>No Skill added yet.</p>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
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
