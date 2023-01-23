@extends('layouts.icts')

@push('styles')
    <link rel="stylesheet" href="{{ asset('bootstrap-template/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bootstrap-template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-template/dist/css/sweetalert2.min.css') }}">
    <style>
        .form-label {
            margin-bottom: 0%;
        }
    </style>
@endpush

@section('main-content')
    <h3 class="text-center">Technical Service Report</h3>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <p class="form-label">TSRF:</p>
                                <input type="text" name="tsrf_no" class="form-control form-control-sm tsrf">
                                <span class="text-danger text-sm tsrf_noError"></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <p class="form-label">Department:</p>
                                <select name="department" id="department" class="form-control form-control-sm department">
                                    <option value="">NONE</option>
                                    @foreach ($department as $departments)
                                        <option value="{{ $departments->id }}">{{ $departments->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger text-sm departmentError"></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <p class="form-label">Reported By:</p>
                                <input type="text" name="reported_by" class="form-control form-control-sm reportedBy">
                                <span class="text-danger text-sm reportedByError"></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <p class="form-label">Date Reported:</p>
                                <input type="date" name="date_reported"
                                    class="form-control form-control-sm dateReported">
                                <span class="text-danger text-sm dateReportedError"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="form-label">Problem Reported:</p>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" id="Computer Hardware" type="checkbox"
                                                        value="Computer Hardware">
                                                    <label class="form-check-label" for="Computer Hardware">Computer
                                                        Hardware</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="computerSoftware" type="checkbox"
                                                        value="Computer Software">
                                                    <label class="form-check-label" for="computerSoftware">Computer
                                                        Software</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="setupandconfig" type="checkbox"
                                                        value="Setup and Configuration">
                                                    <label class="form-check-label" for="setupandconfig">Setup and
                                                        Configuration</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="telephone" type="checkbox"
                                                        value="Telephone Equipment">
                                                    <label class="form-check-label" for="telephone">Telephone
                                                        Equipment</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="networkConnectivity"
                                                            type="checkbox" value="Network Connectivity">
                                                        <label class="form-check-label" for="networkConnectivity">Network
                                                            Connectivity</label>
                                                    </div>
                                                </div>
                                                <div class="form-check">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="networkdevice" type="checkbox"
                                                            value="Network Devices">
                                                        <label class="form-check-label" for="networkdevice">Network
                                                            Device</label>
                                                    </div>
                                                </div>
                                                <div class="form-check">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="cabling" type="checkbox"
                                                            value="Telephone/Network Cabling">
                                                        <label class="form-check-label" for="cabling">Telephone/Network
                                                            Cabling</label>
                                                    </div>
                                                </div>
                                                <div class="form-check">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="audiovisual" type="checkbox"
                                                            value="Audio Visual">
                                                        <label class="form-check-label" for="audiovisual">Audio
                                                            Visual</label>
                                                    </div>
                                                </div>
                                                <div class="form-check">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="others" type="checkbox"
                                                            value="Others">
                                                        <label class="form-check-label" for="others">Others: <span
                                                                class="text-info specifiedItems"></span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="form-label">Hardware Information:</p>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row" style="margin-bottom: 5px;">
                                        <div class="col-sm-3">Equipment No:</div>
                                        <div class="col-sm-6">
                                            <input type="text" name="equipment_no"
                                                class="form-control form-control-sm equipment_no">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">Date Purchase:</div>
                                        <div class="col-sm-6">
                                            <input type="text" name="date_purchased"
                                                class="form-control form-control-sm date_purchased">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="form-label">Findings: <small><span
                                        class="text-danger problemFindingsError"></span></small></p>
                            <textarea name="findings" id="findings" cols="30" rows="2" style="resize: none;"
                                class="form-control form-control-sm findings"></textarea>

                        </div>
                        <div class="col-sm-6">
                            <p class="form-label">Work Done: <span class="text-danger text-sm workDoneError"></span>
                            </p>
                            <div class="form-group">
                                <textarea name="work_done" class="form-control form-control-sm work_done" id="" cols="30"
                                    style="resize: none;" rows="15"></textarea>
                            </div>
                            <div class="form-group">
                                <p class="form-label">Recommendation: <small><span>
                                            <textarea name="recommendation" id="recommendation" cols="30" rows="2" style="resize:none;"
                                                class="form-control form-control-sm recommendation"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-center">
                                <div class="form-group">
                                    <p class="form-label">User's Signed</p>
                                    <input type="text" name="users_signed" style="margin: auto;"
                                        class="form-control col-6 form-control-sm user_signed">
                                    <span class="text-danger text-sm userSignedError"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p class="form-label">Technician on duty:</p>
                                        <select name="tod" id="tod" class="form-control form-control-sm tod">
                                            <option value="">NONE</option>
                                            @foreach ($technician as $tech)
                                                <option value="{{ $tech->id }}">{{ $tech->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger text-sm technicianError"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p class="form-label">Date Signed:</p>
                                        <input type="date" name="date_signed"
                                            class="form-control form-control-sm date_signed">
                                        <span class="text-danger text-sm dateSignedError"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn col-4 btn-sm btn-primary saveReport">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Others modal -->
    <div class="modal fade othersModal" id="modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Please Specify Item:</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p>Specify:</p>
                        <input type="text" name="specified" class="form-control form-control-sm specifyInput">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger specifiedCancel" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary specifiedAdd">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('bootstrap-template/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('bootstrap-template/dist/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/TSRF/addReport.js') }}"></script>
    {{-- <script>
        $(function() {







            $('.saveReport').on('click', function() {

                let tsrf_no = $('.tsrf').val();
                let department = $('.department').val();
                let reported_by = $('.reportedBy').val();
                let date_reported = $('.dateReported').val();
                let equipment_no = $('.equipment_no').val();
                let date_purchased = $('.date_purchased').val();
                let problem_findings = $('.findings').val();
                let work_done = $('.work_done').val();
                let user_signed = $('.user_signed').val();
                let tod = $('.tod').val();
                let recommendation = $('.recommendation').val();
                let date_signed = $('.date_signed').val();
                let problem_reported = $('input[type="checkbox"]:checked')
                    .map(function() {
                        return $(this).val();
                    })
                    .get()
                    .join(",");

                $.ajax({
                    url: `/tech_reports/report/store`,
                    method: 'POST',
                    dataType: 'json',
                    // data: {
                    //     tsrf_no: tsrf_no,
                    //     department: department,
                    //     reportedBy: reported_by,
                    //     dateReported: date_reported,
                    //     problemReported: problem_reported,
                    //     equipmentNo: equipment_no,
                    //     datePurchase: date_purchased,
                    //     problemFindings: problem_findings,
                    //     workDone: work_done,
                    //     recommendation: recommendation,
                    //     userSigned: user_signed,
                    //     technician: tod,
                    //     dateSigned: date_signed,
                    // },
                    success: function(response) {

                        // $('#tsrfForm')[0].reset();
                        // $(".department").val("").trigger("change");
                        // $('.tsrf_noError').html('');

                        // Swal.fire(
                        //     `${response.reference_no}`,
                        //     'Generated Reference No.',
                        //     'success',
                        // );
                        console.log(response.reference_no);
                    },
                    error: function(error) {
                        console.log(response);
                        $.each(error.responseJSON.errors, function(key, value) {
                            console.log(key + '-' + value);
                            $('.' + key + 'Error').html(value);
                        });
                    }
                })
            })
        })
    </script> --}}
@endpush
