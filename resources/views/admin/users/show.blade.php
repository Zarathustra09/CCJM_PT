<!-- resources/views/admin/users/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @php
            $roles = [0 => 'Client', 1 => 'Agent', 2 => 'Admin'];
            $role = $roles[$user->role] ?? 'Unknown';
        @endphp

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" value="{{ $user->name }}" class="form-control single-input" readonly>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="{{ $user->email }}" class="form-control single-input" readonly>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" id="role" value="{{ $role }}" class="form-control single-input" readonly>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="created_at">Created At</label>
                    <input type="text" id="created_at" value="{{ $user->created_at }}" class="form-control single-input" readonly>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="updated_at">Updated At</label>
                    <input type="text" id="updated_at" value="{{ $user->updated_at }}" class="form-control single-input" readonly>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-12">
                <div class="actions">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit User</a>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
