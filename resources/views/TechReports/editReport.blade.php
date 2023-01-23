@extends('layouts.icts')

@push('styles')
    {{-- <script src="{{ asset('bootstrap-template/dist/js/sweetalert2.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/sweetalert.min.js') }}"></script> --}}
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('bootstrap-template/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bootstrap-template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('main-content')
    @php
        use Carbon\Carbon;
        $related_problem = explode(',', $data['reports']->problem_reported);

        // $dateSigned = new Carbon($data['reports']->date_signed);

    @endphp
    @include('sweetalert::alert')
    <h3 class="text-center">Technical Service Report</h3>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card card-primary card-outline">
                <form action="/tech_reports/update/{{ $data['reports']->id }}" id="tsrfForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <p class="form-label">TSRF:</p>
                                    <input type="text" name="tsrf_no" class="form-control form-control-sm tsrf"
                                        value="{{ $data['reports']->tsrf_no }}">
                                    @error('tsrf_no')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="hidden" name="reference_idno"
                                        value="{{ $data['reports']->reference_id }}">
                                    <p class="form-label">Reference No.</p>
                                    <input type="text" name="reference_no" class="form-control form-control-sm"
                                        value="{{ $data['reports']->technicalReference->reference_no }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <p class="form-label">Department:</p>
                                    <select name="department" id="department"
                                        class="form-control form-control-sm department">
                                        <option value="">NONE</option>
                                        @foreach ($data['department'] as $departments)
                                            <option value="{{ $departments->id }}"
                                                {{ $data['reports']->department_id == $departments->id ? 'selected' : '' }}>
                                                {{ $departments->department_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('department')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <p class="form-label">Reported By:</p>
                                    <input type="text" name="reported_by" class="form-control form-control-sm reportedBy"
                                        value="{{ $data['reports']->reported_by }}">
                                    @error('reported_by')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <p class="form-label">Date Reported:</p>
                                    <input type="date" name="date_reported"
                                        class="form-control form-control-sm date dateReported"
                                        value="{{ $data['reports']->date_reported->format('Y-m-d') }}">
                                    @error('date_reported')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
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
                                                        <input class="form-check-input" name="problem[]"
                                                            id="Computer Hardware" type="checkbox" value="Computer Hardware"
                                                            {{ in_array('Computer Hardware', $related_problem) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Computer Hardware">Computer
                                                            Hardware</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="problem[]"
                                                            id="computerSoftware" type="checkbox" value="Computer Software"
                                                            {{ in_array('Computer Software', $related_problem) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="computerSoftware">Computer
                                                            Software</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="problem[]" id="setupandconfig"
                                                            type="checkbox" value="Setup and Configuration"
                                                            {{ in_array('Setup and Configuration', $related_problem) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="setupandconfig">Setup and
                                                            Configuration</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="problem[]" id="telephone"
                                                            type="checkbox" value="Telephone"
                                                            {{ in_array('Telephone Equipment', $related_problem) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="telephone">Telephone
                                                            Equipment</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="problem[]"
                                                                id="networkConnectivity" type="checkbox"
                                                                value="Network Connectivity"
                                                                {{ in_array('Network Connectivity', $related_problem) ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="networkConnectivity">Network
                                                                Connectivity</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="problem[]"
                                                                id="networkdevice" type="checkbox"
                                                                value="Network Devices"
                                                                {{ in_array('Network Devices', $related_problem) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="networkdevice">Network
                                                                Device</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="problem[]"
                                                                id="cabling" type="checkbox"
                                                                value="Telephone/Network Cabling"
                                                                {{ in_array('Telephone/Network Cabling', $related_problem) ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="cabling">Telephone/Network
                                                                Cabling</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="problem[]"
                                                                id="audiovisual" type="checkbox" value="Audio Visual"
                                                                {{ in_array('Audio Visual', $related_problem) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="audiovisual">Audio
                                                                Visual</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <div class="form-check">
                                                            <input class="form-check-input others" name="problem[]"
                                                                id="others" type="checkbox" value="Others"
                                                                {{ in_array('Others', $related_problem) ? 'checked' : '' }}>
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
                                                    class="form-control form-control-sm equipment_no"
                                                    value="{{ $data['reports']->equipment_no }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">Date Purchase:</div>
                                            <div class="col-sm-6">
                                                <input type="text" name="date_purchased"
                                                    class="form-control form-control-sm date_purchased"
                                                    value="{{ $data['reports']->date_purchased }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="form-label">Findings: <small></small></p>
                                <textarea name="findings" id="findings" cols="30" rows="2" style="resize: none;"
                                    class="form-control form-control-sm findings">{{ $data['reports']->findings }}</textarea>

                            </div>
                            <div class="col-sm-6">
                                <p class="form-label">Work Done: <span
                                        class="text-danger text-sm dateReportedError"></span>
                                </p>
                                <div class="form-group">
                                    <textarea name="work_done" class="form-control form-control-sm work_done" id="" cols="30"
                                        style="resize: none;" rows="15">{{ $data['reports']->work_done }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-center">
                                    <div class="form-group">
                                        <p class="form-label">User's Signed</p>
                                        <input type="text" name="users_signed" style="margin: auto;"
                                            class="form-control col-6 form-control-sm user_signed"
                                            value="{{ $data['reports']->user_signed }}">
                                        <span class="text-danger text-sm userSignedError"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <p class="form-label">Technician on duty:</p>
                                            <select name="tod" id="tod"
                                                class="form-control form-control-sm tod">
                                                <option value="">NONE</option>
                                                @foreach ($data['technician'] as $tech)
                                                    <option value="{{ $tech->id }}"
                                                        {{ $data['reports']->tod == $tech->id ? 'selected' : '' }}>
                                                        {{ $tech->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger text-sm technicianError"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <p class="form-label">Date Signed:</p>
                                            <input type="date" name="date_signed"
                                                class="form-control form-control-sm date_signed"
                                                value="{{ $data['reports']->date_signed->format('Y-m-d') }}">
                                            <span class="text-danger text-sm dateSignedError"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="javascript:void(0);" data-id="{{ $data['reports']->id }}"
                            class="btn col-2 btn-sm btn-danger deleteReport">Delete</a>
                        <a href="javascript:void(0);" class="btn col-2 btn-sm btn-success saveReport">Update</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('bootstrap-template/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.department').select2()
            //Initialize Select2 Elements
            // $('.department').select2({
            //     theme: 'bootstrap4'
            // })


            $('.deleteReport').on('click', function(e) {
                e.preventDefault();

                let _id = $(this).data('id');

                $.ajax({
                    url: `/tech_reports/delete/${_id}`,
                    method: 'DELETE',
                    dataType: 'json',
                    data: {
                        id: _id,
                    },
                    success: function(response) {
                        console.log(response);

                        if (response.status == 200) {
                            window.location.replace('/tech_reports');
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })

            $('.saveReport').on('click', function(e) {
                e.preventDefault();
                $('#tsrfForm').submit();
            });
        })
    </script>
@endpush
