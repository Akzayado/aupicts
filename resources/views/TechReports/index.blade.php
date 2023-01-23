@extends('layouts.icts')


@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('bootstrap-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bootstrap-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('bootstrap-template/plugins/daterangepicker/daterangepicker.css') }}">
    <style>
        table,
        th,
        td {
            font-size: 15px;
        }
    </style>
@endpush
@section('main-content')
    <h3 class="text-center">Technical Service Record</h3>
    <section>
        <div class="row">
            <div class="col-sm-6">
                <a href="/tech_reports/report/create" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Create
                    Reports</a>
            </div>
        </div>
    </section>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-2">
                            <!-- Date range -->
                            <div class="form-group">
                                <p>Date range:</p>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm float-right reportrange"
                                        id="reportrange">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                        <div class="col-sm-2">
                            <p>Search:</p>
                            <input type="text" class="form-control form-control-sm search">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="onloadTbl">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-details">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">TSRF Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success btnEdit">Edit</a>
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
    <!-- InputMask -->
    <script src="{{ asset('bootstrap-template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('bootstrap-template/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/TSRF/getTechReports.js') }}" defer></script>
@endpush
