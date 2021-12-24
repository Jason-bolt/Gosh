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
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card shadow-sm">
                                <img
                                    src="{{ asset('images/default/business_image25.jpeg') }}"
                                    class="img-fluid"
                                    alt="Business"
                                />
                                <div class="card-body text-center">
                                    <div class="card-title">Name of Business</div>
                                    <a href="#" class="lightColor text-white btn rounded-pill"
                                    >View details</a
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card shadow-sm">
                                <img
                                    src="{{ asset('images/default/business_image25.jpeg') }}"
                                    class="img-fluid"
                                    alt="Business"
                                />
                                <div class="card-body text-center">
                                    <div class="card-title">Name of Business</div>
                                    <a href="#" class="lightColor text-white btn rounded-pill"
                                    >View details</a
                                    >
                                </div>
                            </div>
                        </div>

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
                            action="#"
                            method="POST"
                            enctype="multipart/form-data"
                        >
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
                <!-- Owner details -->
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <img
                            src="{{ asset('images/default/owner_image1.jpg') }}"
                            class="img-fluid rounded-circle mx-auto mt-2"
                            alt="User"
                            width="190"
                        />
                        <div class="card-body">
                            <div class="card-tile">
                                <p class="h5">Owner's name</p>
                            </div>
                            <!-- Contact info -->
                            <div class="mt-2">
                                <p class="mb-0">
                                    <i class="bi bi-envelope"></i>
                                    <small>example@email.com</small>
                                </p>
                                <p class="mb-0">
                                    <i class="bi bi-telephone"></i> <small>0123456789</small>
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
                                    action="#"
                                    class="form"
                                    method="POST"
                                    enctype="multipart/form-data"
                                >
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
                                            value="Fname"
                                        />
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>Last name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="last_name"
                                            id="last_name"
                                            value="Lname"
                                        />
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>Phone number</label>
                                        <input
                                            type="tel"
                                            class="form-control"
                                            name="phone"
                                            id="phone"
                                            value="0123456789"
                                        />
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>Email</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="email"
                                            id="email"
                                            value="example@email.com"
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
                                    <form action="#" class="mb-3">
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
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">Skill</p>
                                    <form action="#">
                                        <button class="btn p-0">
                                            <i class="bi bi-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">Skill</p>
                                    <form action="#">
                                        <button class="btn p-0">
                                            <i class="bi bi-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
