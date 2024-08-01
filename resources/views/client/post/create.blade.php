@extends('layouts.app')

@section('content')
    <div class="container py-5 flex-grow-1">
        <div class="row fullscreen align-items-center justify-content-center">
            <div class="container">
                <h3 class="mb-30">Post a Job</h3>
                <div class="row">
                    <div class="col-md-6 mt-10">
                        <input type="text" name="job_title" placeholder="Job Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Job Title'" required class="single-input form-control">
                    </div>
                    <div class="col-md-12 mt-10">
                        <textarea name="job_description" placeholder="Job Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Job Description'" required class="single-textarea form-control"></textarea>
                    </div>
                    <div class="col-md-6 mt-10">
                        <input type="number" name="salary" placeholder="Salary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Salary'" required class="single-input form-control">
                    </div>
                    <div class="col-md-6 mt-10">
                        <input type="file" name="image" required class="form-control-file">
                    </div>
                    <div class="col-md-6 mt-10">
                        <select id="region" name="region" class="form-control">

                        </select>
                    </div>
                    <div class="col-md-6 mt-10">
                        <select id="province" name="province" class="form-control">

                        </select>
                    </div>
                    <div class="col-md-6 mt-10">
                        <select id="city" name="city" class="form-control">

                        </select>
                    </div>
                    <div class="col-md-6 mt-10">
                        <select id="barangay" name="barangay" class="form-control">

                        </select>
                    </div>

                    <div class="col-md-6 input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                        <div class="form-select" id="default-select">
                            <select name="category_id" required class="form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Load regions
                $.ajax({
                    url: '/api/address/regions',
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#region').append('<option value="">Select Region</option>');
                        $.each(data, function(index, value) {
                            $('#region').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });

                // Load provinces based on selected region
                $('#region').on('change', function() {
                    let region_id = $(this).val();
                    if (region_id) {
                        // Pad the region_id with a leading zero if it's less than 10
                        region_id = region_id.padStart(2, '0');
                        $.ajax({
                            url: `/api/address/provinces/${region_id}`,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('#province').empty();
                                $('#province').append('<option value="">Select Province</option>');
                                $.each(data, function(index, value) {
                                    // Use province_id as the value for each option
                                    $('#province').append('<option value="' + value.province_id + '">' + value.name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#province').empty();
                        $('#province').append('<option value="">Select Province</option>');
                    }
                    console.log(region_id)
                });

                // Load cities based on selected province
                // Load cities based on selected province
                $('#province').on('change', function() {
                    let province_id = $(this).val();
                    if (province_id) {
                        $.ajax({
                            url: `/api/address/cities/${province_id}`,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('#city').empty();
                                $('#city').append('<option value="">Select City</option>');
                                $.each(data, function(index, value) {
                                    // Use city_id as the value for each option
                                    $('#city').append('<option value="' + value.city_id + '">' + value.name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#city').empty();
                        $('#city').append('<option value="">Select City</option>');
                    }
                });

                // Load barangays based on selected city
                $('#city').on('change', function() {
                    let city_id = $(this).val();
                    if (city_id) {
                        // Pad the city_id with a leading zero if it's less than 10
                        city_id = city_id.padStart(2, '0');
                        $.ajax({
                            url: `/api/address/barangays/${city_id}`,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('#barangay').empty();
                                $('#barangay').append('<option value="">Select Barangay</option>');
                                $.each(data, function(index, value) {
                                    $('#barangay').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#barangay').empty();
                        $('#barangay').append('<option value="">Select Barangay</option>');
                    }
                });
            });
        </script>
    @endpush
@endsection
