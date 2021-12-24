@extends('myLayout.app')

@section('content')
    <!-- Contact Form -->
    <section class="p-sm-5 py-5">
        <div class="container">
            <h2 class="text-center">Send us a message</h2>
            <div class="row">
                <div class="col-md-10 col-lg-8 m-auto">
                    <form action="#" class="form">
                        <!-- Name -->
                        <div>
                            <label class="text-secondary text-start py-2">Name*</label>
                            <div
                                class="
										d-sm-flex
										align-items-center
										justify-content-between
										mb-2
									"
                            >
                                <input
                                    type="text"
                                    class="form-control me-sm-2 mb-3 mb-sm-0"
                                    name="first_name"
                                    id="first_name"
                                    placeholder="First Name"
                                    required
                                />
                                <input
                                    type="text"
                                    class="form-control ms-sm-2"
                                    name="last_name"
                                    id="last_name"
                                    placeholder="Last Name"
                                    required
                                />
                            </div>
                        </div>
                        <!-- Email -->
                        <div>
                            <label class="text-secondary text-start py-2">Email*</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control mb-2"
                                placeholder="example@email.com"
                                required
                            />
                        </div>
                        <!-- Message -->
                        <div>
                            <label class="text-secondary text-start py-2">Message*</label>
                            <textarea
                                name="message"
                                id="message"
                                rows="4"
                                class="form-control mb-3"
                            ></textarea>
                        </div>
                        <input
                            class="btn lightColor text-white mt-4 py-2"
                            value="SUBMIT"
                            name="contact_submit"
                        />
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
