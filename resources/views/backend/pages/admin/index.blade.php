@extends('backend.layouts.master')
@push('css')
@endpush
@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-light">Admin List</h4>
                </div>
                <div class="col-md-6 text-end">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#adminAddModal">
                        <i class="bx bx-plus"></i>
                        Add New Admin
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $key => $admin)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if ($admin->image != null && file_exists(public_path('uploads/' . $admin->image)))
                                        <img src="{{ asset('uploads') }}/{{ $admin->image }}" alt="user image"
                                            class="rounded-circle" width="60px" height="60px">
                                    @else
                                        <img src="{{ asset('uploads/default.png') }}" alt="user image"
                                            class="rounded-circle" width="60px" height="60px">
                                    @endif
                                </td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>{{ $admin->address }}</td>
                                <td>
                                    <a href="{{ route('admin.show', $admin->id) }}" class="btn btn-info btn-sm">
                                        <i class="bx bx-user"></i>
                                    </a>
                                    <a class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#adminEditModal{{ $admin->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <button onclick="deleteData({{ $admin->id }})" type="button"
                                        class="btn btn-danger btn-sm {{ $admin->id == auth()->user()->id ? 'disabled' : '' }}">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $admin->id }}" action="{{ url('admin/' . $admin->id) }}"
                                        method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    {{-- Edit Admin Modal --}}
                                    <div class="modal fade" id="adminEditModal{{ $admin->id }}" tabindex="-1"
                                        style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Admin</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <form class="row g-3" action="{{ route('admin.update', $admin->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="col-md-6">
                                                            <label for="input25" class="form-label">Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Name" name="name"
                                                                    value="{{ $admin->name }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="name" class="form-label">Role</label>
                                                            <select name="role_id" class="form-select">
                                                                <option value="" disabled selected>Select Role
                                                                </option>
                                                                @foreach ($roles as $role)
                                                                    <option
                                                                        value="{{ $role->id }}"{{ $role->id == $admin->role_id ? 'selected' : '' }}>
                                                                        {{ $role->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="email" class="form-label">Email</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-envelope"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Email" name="email" required
                                                                    value="{{ $admin->email }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-phone"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Phone" name="phone"
                                                                    value="{{ $admin->phone }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="address" class="form-label">Address</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-map"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Address" name="address">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="image" class="form-label">Image</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-image"></i></span>
                                                                <input type="file" class="form-control"
                                                                    name="image">
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
        <div class="modal fade" id="adminAddModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{ route('admin.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="input25" class="form-label">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Role</label>
                                <select name="role_id" class="form-select">
                                    <option value="" disabled selected>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="text" class="form-control" placeholder="Email" name="email"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                    <input type="text" class="form-control" placeholder="Phone" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-map"></i></span>
                                    <input type="text" class="form-control" placeholder="Address" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-image"></i></span>
                                    <input type="file" class="form-control" placeholder="Image" name="image">
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
@push('js')
@endpush
