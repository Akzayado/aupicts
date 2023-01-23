@extends('layouts.icts')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('bootstrap-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bootstrap-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-template/dist/css/sweetalert2.min.css') }}">
    <style>
        .custom-label {
            margin: 0%;
        }
    </style>
@endpush

@section('main-content')
    <h3 class="text-center">Manage Users</h3>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <a href="#" style="margin-bottom: 5px;" class="btn btn-sm btn-primary btnCreate" data-toggle="modal"
                data-target="#userModal">Create New User</a>
            <div class="card card-default">
                <div class="card-body">
                    <table id="userTable" class="table table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Authorization</th>
                            <th style="width: 20%;">Action</th>
                        </thead>
                        <tbody id="table-data">
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->role }}</td>
                                    <td>Level {{ $user->auth_level }}</td>
                                    <td>
                                        <a href="#" data-id="{{ $user->id }}"
                                            class="btn btn-xs btn-success btnEdit">Edit</a>
                                        @if (Auth::user()->role_id == 1)
                                            <a href="#" data-id="{{ $user->id }}"
                                                class="btn btn-xs btn-danger btnDelete"><i class="fa fa-trash"></i>
                                        @endif
                                        </a>
                                        <a href="#" data-id="{{ $user->id }}"
                                            class="btn btn-xs btn-info resetBtn">Reset Password</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modals Here -->

    <div class="modal fade userm" id="userModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <small><span class="text-danger nameError"></span></small>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm fname" placeholder="Firstname">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm lname" placeholder="Lastname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <p class="custom-label">Username</p>
                                <input type="text" class="form-control form-control-sm username">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="custom-label">Email: <small><span class="text-danger emailError"></span></small></p>
                        <input type="email" name="email" class="form-control form-control-sm email" placeholder="Email">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <p class="custom-label">Role:</p>
                                <select name="role" class="form-control form-control-sm role" id="">
                                    <option value="">--select--</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
                                <small><span class="text-danger roleError"></span></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <p class="custom-label">Authentication Level:</p>
                                <select name="auth_lvl" class="form-control form-control-sm auth_lvl" id="">
                                    <option value="">--select--</option>
                                    <option value="1">Level 1</option>
                                    <option value="2">Level 2</option>
                                    <option value="3">Level 3</option>
                                    <option value="4">Level 4</option>
                                    <option value="5">Level 5</option>
                                </select>
                                <small><span class="text-danger auth_lvlError"></span></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group div-pass">
                        <p>Password: <small><span class="text-danger passwordError"></span></small></p>
                        <input type="text" name="password" class="form-control form-control-sm password"
                            placeholder="...password">
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancel</button>
                    <button type="button" id="userBtn" class="btn"></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade reset" id="modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reset Password:</h4>

                </div>
                <div class="modal-body">
                    <input type="hidden" class="reset_id">
                    <div class="form-group">
                        <p>Password:</p>
                        <input type="text" name="password" class="form-control form-control-sm reset-password">
                    </div>
                    <div class="reset_errors"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger reset-cancel" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="reset">Reset Now</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('bootstrap-template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Page specific script -->
    <script src="{{ asset('bootstrap-template/dist/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/manage/users/users.js') }}"></script>
@endpush
