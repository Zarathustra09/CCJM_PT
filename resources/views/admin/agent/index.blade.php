@extends('layouts.app')

@section('content')
    <div class="container py-5 flex-grow-1">
        <div class="row fullscreen align-items-center justify-content-center">
    <table id="dataTable" class="display" style="width:100%; table-layout: fixed;">
        <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Gender</th>
            <th>Birthdate</th>
            <th>Civil Status</th>
            <th>Application Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
    </div>
    <!-- SweetAlert2 Modals -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "bDestroy": true,
                ajax: '{{ route("agent.datatable") }}', // Adjusted route
                columns: [
                    { data: 'agent_id', name: 'agent_id' },
                    { data: 'full_name', name: 'full_name' },
                    { data: 'address', name: 'address' },
                    { data: 'contact_number', name: 'contact_number' },
                    { data: 'gender', name: 'gender' },
                    { data: 'birthdate', name: 'birthdate' },
                    { data: 'civil_status', name: 'civil_status' },
                    {
                        data: 'application_status',
                        name: 'application_status',
                        render: function(data, type, row) {
                            const statuses = { 0: 'Unapproved', 1: 'Approved' };
                            return statuses[data] || 'Unknown';
                        }
                    },
                    {
                        data: null,
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<div class="d-flex justify-content-around">' +
                                '<a href="#" class="btn btn-info btn-sm mx-1" title="View" onclick="viewAgent(' + data.agent_id + ')">' +
                                '<i class="fas fa-eye"></i>' +
                                '</a>' +
                                '<a href="#" class="btn btn-warning btn-sm mx-1" title="Edit" onclick="editAgent(' + data.agent_id + ')">' +
                                '<i class="fas fa-edit"></i>' +
                                '</a>' +
                                '<a href="#" class="btn btn-danger btn-sm mx-1" title="Delete" onclick="deleteAgent(' + data.agent_id + ')">' +
                                '<i class="fas fa-trash"></i>' +
                                '</a>' +
                                '</div>';
                        }
                    }
                ]
            });
        });

        function viewAgent(agentId) {
            console.log(agentId)
            $.ajax({
                url: '/admin/agents/' + agentId,
                method: 'GET',
                success: function(response) {
                    const agent = response.data;
                    const documents = agent.documents;
                    const baseUrl = '{{ asset('storage') }}';
                    const resumeUrl = `${baseUrl}/${documents.resume}`;
                    const governmentIdUrl = `${baseUrl}/${documents.government_id}`;
                    const proofOfAddressUrl = `${baseUrl}/${documents.proof_of_address}`;
                    const nbiClearanceUrl = `${baseUrl}/${documents.nbi_clearance}`;
                    const medicalCertUrl = `${baseUrl}/${documents.medical_cert}`;
                    const drugTestUrl = `${baseUrl}/${documents.drug_test}`;

                    const applicationStatus = agent.application_status == 1 ? 'Approved' : 'Unapproved';
                    Swal.fire({
                        title: 'Agent Details',
                        icon: "question",
                        html: `
        <div class="row">
            <!-- Details Column -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control single-input" value="${agent.full_name}" readonly>
                </div>
                <div class="form-group mt-2">
                    <label>Address</label>
                    <input type="text" class="form-control single-input" value="${agent.address}" readonly>
                </div>
                <div class="form-group mt-2">
                    <label>Contact Number</label>
                    <input type="text" class="form-control single-input" value="${agent.contact_number}" readonly>
                </div>
                <div class="form-group mt-2">
                    <label>Gender</label>
                    <input type="text" class="form-control single-input" value="${agent.gender}" readonly>
                </div>
                <div class="form-group mt-2">
                    <label>Birthdate</label>
                    <input type="text" class="form-control single-input" value="${agent.birthdate}" readonly>
                </div>
                <div class="form-group mt-2">
                    <label>Civil Status</label>
                    <input type="text" class="form-control single-input" value="${agent.civil_status}" readonly>
                </div>
               <div class="form-group mt-2">
                    <label>Application Status</label>
                    <input type="text" class="form-control single-input" value="${applicationStatus}" readonly>
                </div>
            </div>

            <!-- Documents Column -->
            <div class="col-sm-6">
                <div class="form-group">
                    <a href="${resumeUrl}" target="_blank" class="form-control single-input">View Resume</a>
                </div>
                <div class="form-group mt-2">
                    <a href="${governmentIdUrl}" target="_blank" class="form-control single-input">View Government ID</a>
                </div>
                <div class="form-group mt-2">
                    <a href="${proofOfAddressUrl}" target="_blank" class="form-control single-input">View Proof of Address</a>
                </div>
                <div class="form-group mt-2">
                    <a href="${nbiClearanceUrl}" target="_blank" class="form-control single-input">View NBI Clearance</a>
                </div>
                <div class="form-group mt-2">
                    <a href="${medicalCertUrl}" target="_blank" class="form-control single-input">View Medical Certificate</a>
                </div>
                <div class="form-group mt-2">
                    <a href="${drugTestUrl}" target="_blank" class="form-control single-input">View Drug Test</a>
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





        function editAgent(agentId) {
            $.ajax({
                url: '/admin/agents/' + agentId + '/edit',
                method: 'GET',
                success: function(response) {
                    const agent = response.data;
                    const statuses = { 0: 'Unapproved', 1: 'Approved' };

                    Swal.fire({
                        title: 'Edit Agent',
                        icon: "info",
                        showCloseButton: true,
                        width: '600px',
                        customClass: {
                            container: 'custom-swal-container'
                        },
                        html: `
                    <form id="editForm">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" id="editFullName" class="form-control single-input" value="${agent.full_name}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" id="editAddress" class="form-control single-input" value="${agent.address}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" id="editContactNumber" class="form-control single-input" value="${agent.contact_number}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" id="editGender" class="form-control single-input" value="${agent.gender}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Birthdate</label>
                                    <input type="text" id="editBirthdate" class="form-control single-input" value="${agent.birthdate}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Civil Status</label>
                                    <input type="text" id="editCivilStatus" class="form-control single-input" value="${agent.civil_status}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Application Status</label>
                                <select id="editApplicationStatus" class="form-control single-input">
                                    <option value="0" ${agent.application_status == 0 ? 'selected' : ''}>Unapproved</option>
                                    <option value="1" ${agent.application_status == 1 ? 'selected' : ''}>Approved</option>
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
                                const fullName = Swal.getPopup().querySelector('#editFullName').value;
                                const address = Swal.getPopup().querySelector('#editAddress').value;
                                const contactNumber = Swal.getPopup().querySelector('#editContactNumber').value;
                                const gender = Swal.getPopup().querySelector('#editGender').value;
                                const birthdate = Swal.getPopup().querySelector('#editBirthdate').value;
                                const civilStatus = Swal.getPopup().querySelector('#editCivilStatus').value;
                                const applicationStatus = Swal.getPopup().querySelector('#editApplicationStatus').value;

                                if (!fullName || !address || !contactNumber || !gender || !birthdate || !civilStatus || !applicationStatus) {
                                    Swal.showValidationMessage('Please fill out all fields');
                                    return;
                                }

                                $.ajax({
                                    url: '/admin/agents/' + agentId,
                                    method: 'PUT',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        full_name: fullName,
                                        address: address,
                                        contact_number: contactNumber,
                                        gender: gender,
                                        birthdate: birthdate,
                                        civil_status: civilStatus,
                                        application_status: applicationStatus
                                    },
                                    success: function() {
                                        Swal.fire('Updated!', 'Agent has been updated.', 'success');
                                        $('#dataTable').DataTable().ajax.reload();
                                    },
                                    error: function() {
                                        Swal.fire('Error!', 'There was a problem updating the agent.', 'error');
                                    }
                                });
                            });
                        }
                    });
                }
            });
        }

        function deleteAgent(agentId) {
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
                        url: '/admin/agents/' + agentId,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function() {
                            Swal.fire(
                                'Deleted!',
                                'Agent has been deleted.',
                                'success'
                            );
                            $('#dataTable').DataTable().ajax.reload();
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the agent.',
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
