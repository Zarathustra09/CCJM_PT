@extends('layouts.app')

@section('content')
    <table id="dataTable" class="display" style="width:100%; table-layout: fixed;">
        <thead>
        <tr>
            <th>ID</th>
            <th>Job Title</th>
            <th>Description</th>
            <th>Salary</th>
            <th>Location</th>
            <th>Status</th>
            <th>Assigned Agent</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <!-- SweetAlert2 Modals -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "bDestroy": true,
                ajax: '{{ route("jobs.datatable") }}',
                columns: [
                    { data: 'job_id', name: 'job_id' },
                    { data: 'job_title', name: 'job_title' },
                    { data: 'job_description', name: 'job_description' },
                    { data: 'salary', name: 'salary' },
                    { data: 'location', name: 'location' },
                    { data: 'status', name: 'status' },
                    { data: 'agent_id', name: 'agent_id', render: function(data) { return data || 'N/A'; } },
                    {
                        data: null,
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<div class="d-flex justify-content-around">' +
                                '<a href="#" class="btn btn-info btn-sm mx-1" title="View" onclick="viewJob(' + data.job_id + ')">' +
                                '<i class="fas fa-eye"></i>' +
                                '</a>' +
                                '<a href="#" class="btn btn-warning btn-sm mx-1" title="Edit" onclick="editJob(' + data.job_id + ')">' +
                                '<i class="fas fa-edit"></i>' +
                                '</a>' +
                                '<a href="#" class="btn btn-danger btn-sm mx-1" title="Delete" onclick="deleteJob(' + data.job_id + ')">' +
                                '<i class="fas fa-trash"></i>' +
                                '</a>' +
                                '</div>';
                        }
                    },
                ]
            });
        });

        function viewJob(jobId) {
            $.ajax({
                url: '/admin/jobs/' + jobId,
                method: 'GET',
                success: function(response) {
                    const job = response.data;

                    Swal.fire({
                        title: 'Job Details',
                        icon: "info",
                        html: `
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input type="text" class="form-control single-input" value="${job.job_title}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control single-input" readonly>${job.job_description}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input type="text" class="form-control single-input" value="${job.salary}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" class="form-control single-input" value="${job.location}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control single-input" value="${job.status}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Assigned Agent</label>
                                        <input type="text" class="form-control single-input" value="${job.agent_id}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Created At</label>
                                        <input type="text" class="form-control single-input" value="${job.created_at}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Updated At</label>
                                        <input type="text" class="form-control single-input" value="${job.updated_at}" readonly>
                                    </div>
                                </div>
                            </div>
                        `,
                        showCloseButton: true,
                        showConfirmButton: false,
                        width: '600px',
                        customClass: {
                            container: 'custom-swal-container'
                        }
                    });
                }
            });
        }

        function editJob(jobId) {
            $.ajax({
                url: '/admin/jobs/' + jobId + '/edit',
                method: 'GET',
                success: function(response) {
                    const job = response.data;

                    Swal.fire({
                        title: 'Edit Job',
                        icon: "info",
                        html: `
                    <form id="editForm">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Job Title</label>
                                    <input type="text" id="editTitle" class="form-control single-input" value="${job.job_title}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="editDescription" class="form-control single-input" required>${job.job_description}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Salary</label>
                                    <input type="text" id="editSalary" class="form-control single-input" value="${job.salary}" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" id="editLocation" class="form-control single-input" value="${job.location}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" id="editStatus" class="form-control single-input" value="${job.status}" required>
                                </div>
                            </div>
                        </div>
                    </form>
                `,
                        showCancelButton: true,
                        confirmButtonText: 'Save changes',
                        cancelButtonText: 'Cancel',
                        preConfirm: () => {
                            return new Promise((resolve, reject) => {
                                const job_title = Swal.getPopup().querySelector('#editTitle').value;
                                const job_description = Swal.getPopup().querySelector('#editDescription').value;
                                const salary = Swal.getPopup().querySelector('#editSalary').value;
                                const location = Swal.getPopup().querySelector('#editLocation').value;
                                const status = Swal.getPopup().querySelector('#editStatus').value;

                                if (!job_title || !job_description) {
                                    Swal.showValidationMessage('Please enter both job title and description');
                                    return;
                                }

                                $.ajax({
                                    url: '/admin/jobs/' + jobId,
                                    method: 'PUT',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        job_title,
                                        job_description,
                                        salary,
                                        location,
                                        status
                                    },
                                    success: function() {
                                        Swal.fire('Updated!', 'Job has been updated.', 'success');
                                        $('#dataTable').DataTable().ajax.reload();
                                    },
                                    error: function() {
                                        Swal.fire('Error!', 'There was a problem updating the job.', 'error');
                                    }
                                });
                            });
                        }
                    });
                }
            });
        }

        function deleteJob(jobId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/jobs/' + jobId,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function() {
                            Swal.fire(
                                'Deleted!',
                                'Job has been deleted.',
                                'success'
                            );
                            $('#dataTable').DataTable().ajax.reload();
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the job.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>

    <style>
        .custom-swal-container {
            font-size: 16px;
        }
        #dataTable {
            width: 100%;
            table-layout: fixed;
        }
    </style>
@endsection
