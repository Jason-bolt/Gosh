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
