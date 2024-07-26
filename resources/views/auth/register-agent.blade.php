@extends('layouts.app')

@section('content')
    <style>
        h1 {
            text-align: center;
        }
        h2 {
            margin: 0;
        }
        #multi-step-form-container {
            margin-top: 5rem;
        }
        .text-center {
            text-align: center;
        }
        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }
        .pl-0 {
            padding-left: 0;
        }
        .button {
            padding: 0.7rem 1.5rem;
            border: 1px solid #795fff;
            background-color: #795fff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn {
            border: 1px solid #0e9594;
            background-color: #0e9594;
        }
        .mt-3 {
            margin-top: 2rem;
        }
        .d-none {
            display: none;
        }
        .form-step {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            padding: 3rem;
        }
        .font-normal {
            font-weight: normal;
        }
        ul.form-stepper {
            counter-reset: section;
            margin-bottom: 3rem;
        }
        ul.form-stepper .form-stepper-circle {
            position: relative;
        }
        ul.form-stepper .form-stepper-circle span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
        }
        .form-stepper-horizontal {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }
        ul.form-stepper > li:not(:last-of-type) {
            margin-bottom: 0.625rem;
            -webkit-transition: margin-bottom 0.4s;
            -o-transition: margin-bottom 0.4s;
            transition: margin-bottom 0.4s;
        }
        .form-stepper-horizontal > li:not(:last-of-type) {
            margin-bottom: 0 !important;
        }
        .form-stepper-horizontal li {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: start;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }
        .form-stepper-horizontal li:not(:last-child):after {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            height: 1px;
            content: "";
            top: 32%;
        }
        .form-stepper-horizontal li:after {
            background-color: #dee2e6;
        }
        .form-stepper-horizontal li.form-stepper-completed:after {
            background-color: #4da3ff;
        }
        .form-stepper-horizontal li:last-child {
            flex: unset;
        }
        ul.form-stepper li a .form-stepper-circle {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-right: 0;
            line-height: 1.7rem;
            text-align: center;
            background: rgba(0, 0, 0, 0.38);
            border-radius: 50%;
        }
        .form-stepper .form-stepper-active .form-stepper-circle {
            background-color: #795fff !important;
            color: #fff;
        }
        .form-stepper .form-stepper-active .label {
            color: #795fff !important;
        }
        .form-stepper .form-stepper-active .form-stepper-circle:hover {
            background-color: #795fff !important;
            color: #fff !important;
        }
        .form-stepper .form-stepper-unfinished .form-stepper-circle {
            background-color: #f8f7ff;
        }
        .form-stepper .form-stepper-completed .form-stepper-circle {
            background-color: #0e9594 !important;
            color: #fff;
        }
        .form-stepper .form-stepper-completed .label {
            color: #0e9594 !important;
        }
        .form-stepper .form-stepper-completed .form-stepper-circle:hover {
            background-color: #0e9594 !important;
            color: #fff !important;
        }
        .form-stepper .form-stepper-active span.text-muted {
            color: #fff !important;
        }
        .form-stepper .form-stepper-completed span.text-muted {
            color: #fff !important;
        }
        .form-stepper .label {
            font-size: 1rem;
            margin-top: 0.5rem;
        }
        .form-stepper a {
            cursor: default;
        }
        @media (max-width: 480px) {
            .form-step {
                padding: 0.5rem;
            }
            .form-stepper-horizontal li {
                flex-direction: column;
                align-items: center;
            }
            .form-stepper-horizontal li:not(:last-child):after {
                position: absolute;
                width: 1px;
                height: 50%;
                left: 50%;
                top: 50px;
            }
            .form-stepper .label {
                font-size: 0.7rem;
            }
            .form-stepper-circle {
                width: 25px;
                height: 25px;
            }
            .button, .submit-btn {
                padding: 0.4rem 0.8rem;
            }
        }


    </style>
    <body>

    </body>
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
                                        <textarea name="address" id="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" class="form-control single-input"></textarea>
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

    <script>
        /**
         * Define a function to navigate betweens form steps.
         * It accepts one parameter. That is - step number.
         */
        const navigateToFormStep = (stepNumber) => {
            /**
             * Hide all form steps.
             */
            document.querySelectorAll(".form-step").forEach((formStepElement) => {
                formStepElement.classList.add("d-none");
            });
            /**
             * Mark all form steps as unfinished.
             */
            document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
                formStepHeader.classList.add("form-stepper-unfinished");
                formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
            });
            /**
             * Show the current form step (as passed to the function).
             */
            document.querySelector("#step-" + stepNumber).classList.remove("d-none");
            /**
             * Select the form step circle (progress bar).
             */
            const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
            /**
             * Mark the current form step as active.
             */
            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
            formStepCircle.classList.add("form-stepper-active");
            /**
             * Loop through each form step circles.
             * This loop will continue up to the current step number.
             * Example: If the current step is 3,
             * then the loop will perform operations for step 1 and 2.
             */
            for (let index = 0; index < stepNumber; index++) {
                /**
                 * Select the form step circle (progress bar).
                 */
                const formStepCircle = document.querySelector('li[step="' + index + '"]');
                /**
                 * Check if the element exist. If yes, then proceed.
                 */
                if (formStepCircle) {
                    /**
                     * Mark the form step as completed.
                     */
                    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                    formStepCircle.classList.add("form-stepper-completed");
                }
            }
        };
        /**
         * Select all form navigation buttons, and loop through them.
         */
        document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
            /**
             * Add a click event listener to the button.
             */
            formNavigationBtn.addEventListener("click", () => {
                /**
                 * Get the value of the step.
                 */
                const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
                /**
                 * Call the function to navigate to the target form step.
                 */
                navigateToFormStep(stepNumber);
            });
        });

        var selectedSkills = [];

        function addSkill() {
            var select = document.getElementById('skills');
            var selectedSkill = select.options[select.selectedIndex];
            var selectedSkillId = selectedSkill.value;
            var selectedSkillText = selectedSkill.text;

            if (selectedSkills.length < 3 && !selectedSkills.find(skill => skill.id === selectedSkillId)) {
                selectedSkills.push({id: selectedSkillId, text: selectedSkillText});
                document.getElementById('selected_skills').value = selectedSkills.map(skill => skill.text).join(', ');
                document.getElementById('hidden_selected_skills').value = selectedSkills.map(skill => skill.id).join(', ');

                if (selectedSkills.length === 3) {
                    console.log('Selected Skills:', selectedSkills);
                }
            } else if (selectedSkills.find(skill => skill.id === selectedSkillId)) {
                alert("You have already selected this skill.");
            } else {
                alert("You can only select up to 3 skills.");
            }

            select.selectedIndex = 0;  // Reset the select box
        }

    </script>
@endsection
