@extends('layouts.icts')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('bootstrap-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bootstrap-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('bootstrap-template/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- InputMask -->
    <script src="{{ asset('bootstrap-template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('bootstrap-template/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <style>
        .custom-label {
            margin: 0%;
        }

        .modalCenter {
            top: 20% !important;
            transform: translateY(-50%) !important;
        }

        .modal-content {
            -webkit-border-radius: 0px !important;
            -moz-border-radius: 0px !important;
            border-radius: 0px !important;
        }
    </style>
@endpush
@section('main-content')
    <h3 class="text-center">Departmental Charging</h3>
    <div class="row">
        <div class="col-sm-2">
            <!-- Date range -->
            <div class="form-group">
                <p class="custom-label">Select Start Date and End Date:</p>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control form-control-lgfloat-right reportrange" id="reportrange">
                </div>
                <!-- /.input group -->
            </div>
            <!-- /.form group -->
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="reporttbl"></div>
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
    <script src="{{ asset('bootstrap-template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/TSRF/charging.js') }}"></script>
@endpush
