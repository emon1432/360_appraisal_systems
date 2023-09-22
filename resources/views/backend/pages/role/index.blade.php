@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-light">Role List</h4>
                </div>
                <div class="col-md-6 text-end">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#roleAddModal">
                        <i class="bx bx-plus"></i>
                        Add New Role
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ route('role.show', $role->id) }}" class="btn btn-info btn-sm">
                                        <i class="bx bx-user"></i>
                                    </a>

                                    <a class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#roleEditModal{{ $role->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <button onclick="deleteData({{ $role->id }})" type="button"
                                        class="btn btn-danger btn-sm {{ $role->id == auth()->user()->id ? 'disabled' : '' }}">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $role->id }}"
                                        action="{{ route('role.destroy', $role->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>

                                    {{-- Edit Admin Modal --}}
                                    <div class="modal fade" id="roleEditModal{{ $role->id }}" tabindex="-1"
                                        style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Role</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <form class="row g-3" action="{{ route('role.update', $role->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="col-md-12">
                                                            <label for="input25" class="form-label">Role Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="First Name" name="name" required
                                                                    value="{{ $role->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Add New Admin Modal --}}
        <div class="modal fade" id="roleAddModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{ route('role.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label for="input25" class="form-label">Role Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Role Name" name="name"
                                        required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
