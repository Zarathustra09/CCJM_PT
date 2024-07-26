@extends('layouts.app')

@section('content')
    @push('styles')
        <link href="{{ asset('css/register-agent.css') }}" rel="stylesheet">
    @endpush


    <div>

        <div id="multi-step-form-container">
            <!-- Form Steps / Progress Bar -->
            <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                <!-- Step 1 -->
                <li class="form-stepper-active text-center form-stepper-list" step="1">
                    <a class="mx-2">
                    <span class="form-stepper-circle">
                        <span>1</span>
                    </span>
                        <div class="label">Personal Details</div>
                    </a>


                </li>
                <!-- Step 2 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                    <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>2</span>
                    </span>
                        <div class="label text-muted">Agent Skills</div>
                    </a>
                </li>
                <!-- Step 3 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                    <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>3</span>
                    </span>
                        <div class="label text-muted">Agent Requirement</div>
                    </a>
                </li>
            </ul>
            <!-- Step Wise Form Content -->
            <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST" action="{{ route('register-agent.store') }}" class="container-sm">
                @csrf
                <!-- Step 1 Content -->
                <section id="step-1" class="form-step">
                    <h2 class="font-normal">Agent Personal Details</h2>
                    <!-- Step 1 input fields -->
                    <div class="mt-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" name="full_name" id="full_name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required class="form-control single-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" class="form-control single-input" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Contact Number'" class="form-control single-input">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group input-group-icon">
                                            <div class="icon"><i class="fa fa-venus-mars" aria-hidden="true"></i></div>
                                            <div class="form-select" id="default-select">
                                                <select name="gender" id="gender" class="form-control single-input">
                                                    <option value="">Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="birthdate">Birthdate</label>
                                        <input type="date" name="birthdate" id="birthdate" placeholder="Birthdate" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Birthdate'" class="form-control single-input">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="civil_status">Civil Status</label>
                                        <div class="form-group input-group-icon">
                                            <div class="icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                            <div class="form-select" id="default-select">
                                                <select name="civil_status" id="civil_status" class="form-control single-input">
                                                    <option value="">Civil Status</option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="divorced">Divorced</option>
                                                    <option value="widowed">Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                    </div>
                </section>
                <!-- Step 2 Content, default hidden on page load. -->
                <section id="step-2" class="form-step d-none" style="width: 130%">
                    <h2 class="font-normal">Agent Technical Skills</h2>
                    <div class="mt-3">
                        <div class="container mt-4">
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="skills">Skills</label>
                                        <div class="form-group input-group-icon">
                                            <div class="icon"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                                            <div class="form-select" id="default-select">
                                                <select name="skills" id="skills" class="form-control single-input" onchange="addSkill()">
                                                    <option value="" disabled selected>Select Skills</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->category_id }}">{{ $category->category_description }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">You can select up to 3 skills.</small>
                                        <input type="hidden" name="selected_skills" id="hidden_selected_skills">
                                    </div>

                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="selected_skills">Selected Skills</label>
                                        <textarea id="selected_skills" class="form-control single-input" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                    </div>
                </section>
                <!-- Step 3 Content, default hidden on page load. -->
                <section id="step-3" class="form-step d-none">
                    <h2 class="font-normal">Agent Requirements</h2>
                    <div class="mt-3">
                        <div class="container">
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="resume">Resume</label>
                                        <input type="file" name="resume" id="resume" class="form-control-file">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="government_id">Government ID</label>
                                        <input type="file" name="government_id" id="government_id" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="proof_of_address">Proof of Address</label>
                                        <input type="file" name="proof_of_address" id="proof_of_address" class="form-control-file">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="nbi_clearance">NBI Clearance</label>
                                        <input type="file" name="nbi_clearance" id="nbi_clearance" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="medical_cert">Medical Certificate</label>
                                        <input type="file" name="medical_cert" id="medical_cert" class="form-control-file">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="drug_test">Drug Test</label>
                                        <input type="file" name="drug_test" id="drug_test" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                        <button class="button submit-btn" type="submit">Save</button>
                    </div>
                </section>

            </form>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/register-agent.js') }}"></script>
    @endpush
@endsection
