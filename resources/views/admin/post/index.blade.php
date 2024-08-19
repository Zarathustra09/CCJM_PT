@extends('layouts.app')

@section('content')
    <div class="container py-5 flex-grow-1">
        <div class="row fullscreen align-items-center justify-content-center">
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
            </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
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
                    {
                        data: 'full_location',
                        name: 'full_location',
                        render: function(data) {
                            // Log the full location to the console
                            console.log('Full Location:', data);

                            return data;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data) {
                            return data == 0 ? 'Unapproved' : 'Approved';
                        }
                    },
                    {
                        data: 'agent.full_name',
                        name: 'agent.full_name',
                        render: function(data) { return data || 'N/A'; }
                    },
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
                                <input type="text" class="form-control single-input" value="${job.full_location}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control single-input" value="${job.status == 0 ? 'Unapproved' : 'Approved'}" readonly>
                            </div>
                        </div>
                    </div>
               <div class="row mt-2">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Assigned Agent</label>
                            <input type="text" class="form-control single-input" value="${job.agent.full_name || 'N/A'}" readonly>
                        </div>
                    </div>
                </div>
                    <div class="row mt-2">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Created At</label>
                            <input type="text" class="form-control single-input" value="${moment(job.created_at).format('MMMM Do YYYY, h:mm:ss a')}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Updated At</label>
                            <input type="text" class="form-control single-input" value="${moment(job.updated_at).format('MMMM Do YYYY, h:mm:ss a')}" readonly>
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
                    const agents = response.agents;

                    let agentOptions = '';
                    agents.forEach(agent => {
                        agentOptions += `<option value="${agent.agent_id}" ${job.agent_id == agent.agent_id ? 'selected' : ''}>${agent.full_name}</option>`;
                    });

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
                                <label>Status</label>
                                <select id="editStatus" class="form-control single-input" required>
                                    <option value="0" ${job.status == 0 ? 'selected' : ''}>Unapproved</option>
                                    <option value="1" ${job.status == 1 ? 'selected' : ''}>Approved</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Agent</label>
                                <select id="editAgent" class="form-control single-input" required>
                                    ${agentOptions}
                                </select>
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
                                const status = Swal.getPopup().querySelector('#editStatus').value;
                                const agent_id = Swal.getPopup().querySelector('#editAgent').value;

                                console.log('job_title:', job_title);
                                console.log('job_description:', job_description);
                                console.log('salary:', salary);
                                console.log('status:', status);
                                console.log('agent_id:', agent_id);

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
                                        status,
                                        agent_id
                                    },
                                    success: function() {
                                        Swal.fire('Updated!', 'Job has been updated.', 'success');
                                        $('#dataTable').DataTable().ajax.reload();
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        console.log('Error details:', jqXHR, textStatus, errorThrown);
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
