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
    <h3 class="text-center">Manage Department</h3>

    <div class="row justify-content-center">
        <div class="col-sm-2">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title formTitle">Create</h3>
                </div>
                <div class="card-body">
                    <form action="#">
                        <input type="hidden" name="id" class="department_id">
                        <div class="form-group">
                            <p class="custom-label">Account Code: <small><span style=""
                                        class="text-danger account_codeError"></span></small></p>
                            <input type="text" id="account_code" class="form-control form-control-sm account_code">
                        </div>

                        <div class="form-group">
                            <p class="custom-label">Department: <small><span style=""
                                        class="text-danger departmentError"></span></small></p>
                            <input type="text" id="department_name" class="form-control form-control-sm department_name">
                        </div>

                        <div class="form-group">
                            <a href="#" id="departmentBtn" class="btn btn-sm btn-primary btn-block store">Create
                                New</a>
                        </div>
                        <span class="text-center text-info create"><b>Create New</b></span>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Department</h3>
                </div>
                <div class="card-body">
                    <table id="department" class="table table-bordered table-stripped">
                        <thead>
                            <th>Account Code</th>
                            <th>Department Name</th>
                        </thead>
                        <tbody id="table_department">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('bootstrap-template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Page specific script -->
    <script src="{{ asset('bootstrap-template/dist/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/manage/department/department.js') }}"></script>
@endpush
