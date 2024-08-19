@extends('layouts.app')

@section('content')
    <div class="container py-5 flex-grow-1">
        <div class="row fullscreen align-items-center justify-content-center">
    <table id="dataTable" class="display" style="width:100%; table-layout: fixed;">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
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
                ajax: '{{ route("users.datatable") }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    {
                        data: 'role',
                        name: 'role',
                        render: function(data, type, row) {
                            const roles = { 0: 'Client', 1: 'Agent', 2: 'Admin' };
                            return roles[data] || 'Unknown';
                        }
                    },
                    {
                        data: null,
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<div class="d-flex justify-content-around">' +
                                '<a href="#" class="btn btn-info btn-sm mx-1" title="View" onclick="viewUser(' + data.id + ')">' +
                                '<i class="fas fa-eye"></i>' +
                                '</a>' +
                                '<a href="#" class="btn btn-warning btn-sm mx-1" title="Edit" onclick="editUser(' + data.id + ')">' +
                                '<i class="fas fa-edit"></i>' +
                                '</a>' +
                                '<a href="#" class="btn btn-danger btn-sm mx-1" title="Delete" onclick="deleteUser(' + data.id + ')">' +
                                '<i class="fas fa-trash"></i>' +
                                '</a>' +
                                '</div>';
                        }
                    },
                ]
            });
        });

        function viewUser(userId) {
            $.ajax({
                url: '/users/' + userId,
                method: 'GET',
                success: function(response) {
                    const user = response.data;
                    const roles = { 0: 'Client', 1: 'Agent', 2: 'Admin' };
                    const role = roles[user.role] || 'Unknown';

                    Swal.fire({
                        title: 'User Details',
                        icon: "question",
                        html: `
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control single-input" value="${user.name}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control single-input" value="${user.email}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" class="form-control single-input" value="${role}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Created At</label>
                                    <input type="text" class="form-control single-input" value="${moment(user.created_at).format('MMMM Do YYYY, h:mm:ss a')}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Updated At</label>
                                    <input type="text" class="form-control single-input" value="${moment(user.updated_at).format('MMMM Do YYYY, h:mm:ss a')}" readonly>
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

        function editUser(userId) {
            $.ajax({
                url: '/users/' + userId + '/edit',
                method: 'GET',
                success: function(response) {
                    const user = response.data;

                    Swal.fire({
                        title: 'Edit User',
                        icon: "info",
                        html: `
                    <form id="editForm">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="editName" class="form-control single-input" value="${user.name}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" id="editEmail" class="form-control single-input" value="${user.email}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select id="editRole" class="form-control single-input">
                                        <option value="0" ${user.role == 0 ? 'selected' : ''}>Client</option>
                                        <option value="1" ${user.role == 1 ? 'selected' : ''}>Agent</option>
                                        <option value="2" ${user.role == 2 ? 'selected' : ''}>Admin</option>
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
                                const name = Swal.getPopup().querySelector('#editName').value;
                                const email = Swal.getPopup().querySelector('#editEmail').value;
                                const role = Swal.getPopup().querySelector('#editRole').value;

                                if (!name || !email) {
                                    Swal.showValidationMessage('Please enter both name and email');
                                    return;
                                }

                                $.ajax({
                                    url: '/users/' + userId,
                                    method: 'PUT',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        name: name,
                                        email: email,
                                        role: role
                                    },
                                    success: function() {
                                        Swal.fire('Updated!', 'User has been updated.', 'success');
                                        $('#dataTable').DataTable().ajax.reload();
                                    },
                                    error: function() {
                                        Swal.fire('Error!', 'There was a problem updating the user.', 'error');
                                    }
                                });
                            });
                        }
                    });
                }
            });
        }

        function deleteUser(userId) {
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
                        url: '/users/' + userId,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function() {
                            Swal.fire(
                                'Deleted!',
                                'User has been deleted.',
                                'success'
                            );
                            $('#dataTable').DataTable().ajax.reload();
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the user.',
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
