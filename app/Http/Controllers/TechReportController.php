<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\User;
use App\Models\TechReference;
use App\Models\TechReport;
use Illuminate\Support\Facades\Gate;
use DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
class TechReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'departments' => Department::getDepartment(),
            'reports' => TechReport::where('date_reported', NOW())->get(),
        ];
        return view('TechReports.index', compact('data'));
    }

    public function charging(){
        return view('TechReports.departamental_charging');
    }

    public function getCharges(Request $request){
        $html = '';
        $to_be_charge = TechReport::where('is_charge', '=', true)
                        ->whereBetween('date_reported', [$request->start, $request->end])
                        ->get();
        $html .= '<table class="table table-bordered table-stripped" id="charging-table">';
        $html .= '<thead>
                    <th>Department Code</th>
                    <th>Department</th>
                    <th>Account to be charge</th>
                    <th>Requisition No.</th>
                    <th>Charge Receipt No.</th>
                    <th>TSRF No.</th>
                    <th>Amount</th>
                 </thead>';
        $html .='<tbody>';
                    foreach ($to_be_charge as $charge) {
                        $html .= '<tr>';
                        $html .= '<td>'.$charge->department->account_code.'</td>';
                        $html .= '<td>'.$charge->department->department_name.'</td>';
                        $html .= '<td>-</td>';
                        $html .= '<td>-</td>';
                        $html .= '<td>-</td>';
                        $html .= '<td>'.$charge->tsrf_no.'</td>';
                        $html .= '<td>-</td>';
                        $html .= '</tr>';
                    }
        $html .= '</tbody></table>';

        return response()->json(['data' => $html]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $request->validate([
                'tsrf_no' => 'required|unique:tech_reports',
                'department' => 'required',
                'reportedBy' => 'required',
                'dateReported' => 'required',
                'problemFindings' => 'required',
                'workDone' => 'required',
                'userSigned' => 'required',
                'technician' => 'required',
                'dateSigned' => 'required',
            ]);


            $last_reference = TechReference::latest('id')->first();

            //increment reference no by 1
            $reference_no = $last_reference->reference_no + 1;

            //insert generated reference no and get the id
            $insert_ref_no = DB::table('tech_references')->insertGetId([
                'reference_no' => $reference_no,
            ]);

            $report = new TechReport;

            $report->tsrf_no = $request->tsrf_no;
            $report->reference_id = $insert_ref_no;
            $report->department_id = $request->department;
            $report->reported_by = $request->reportedBy;
            $report->date_reported = $request->dateReported;
            $report->problem_reported = $request->problemReported;
            $report->equipment_no = $request->equipmentNo;
            $report->date_purchased = $request->datePurchase;
            $report->findings = $request->problemFindings;
            $report->recommendation = $request->recommendation;
            $report->work_done = $request->workDone;
            $report->user_signed = $request->userSigned;
            $report->tod = $request->technician;
            $report->date_signed = $request->dateSigned;
            $report->encoded_by = Auth::user()->id;
            $report->save();

            return response()->json(['data' => $request->all(), 'reference_no' => $reference_no]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'reports' => TechReport::findOrFail($id),
            'department' => Department::getDepartment(),
            'technician' => User::select('id', 'name')->whereIn('role_id', [0,1,2,3])->get(),
        ];

        return view('TechReports.editReport', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reference_id = $_GET['reference_idno'];
        $request->validate([
            'tsrf_no' => 'required',
            'reference_no' => 'required',
            'department' => 'required',
            'reported_by' => 'required',
            'date_reported' => 'required',
            'findings' => 'required',
            'work_done' => 'required',
            'users_signed' => 'required',
            'tod' => 'required',
            'date_signed' => 'required',
        ]);

        $update_reference_number = DB::table('tech_references')
        ->where('id', $reference_id)
        ->update(['reference_no' => $request->reference_no]);

        $update_tech_reports_table = DB::table('tech_reports')
                                ->where('id', $id)
                                ->update([
                                    'tsrf_no' => $request->tsrf_no,
                                    'department_id' => $request->department,
                                    'reported_by' => $request->reported_by,
                                    'date_reported' => $request->date_reported,
                                    'problem_reported' => implode(',',$request->problem),
                                    'equipment_no' => $request->equipment_no,
                                    'date_purchased' => $request->date_purchased,
                                    'findings' => $request->findings,
                                    'work_done' => $request->work_done,
                                    'user_signed' => $request->users_signed,
                                    'tod' => $request->tod,
                                    'date_signed' => $request->date_signed,
                                    'encoded_by' => Auth::user()->id,
                                ]);

        // Alert::success('Success', 'Data has been updated successfully');
        alert()->success('Updated successfully!')->persistent('Close');
        return back();

        // return implode(',', $request->problem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_reports = TechReport::findOrFail($id);
        $delete_reference_no = TechReference::where('id', $delete_reports->reference_id);

        $delete_reference_no->delete();
        $delete_reports->delete();

        return response()->json(['status' => 200]);
    }

    public function createReport(){
        $icts = [1,2,3,4,5];
        $department = Department::getDepartment();
        $technician = User::select('id', 'name')->whereIn('role_id', $icts)->get();
        return view('TechReports.addReport', compact('department', 'technician'));
    }

    public function toCharge(Request $request){

        $charge = TechReport::find($request->id);

        if($charge->is_charge == false){
            $charge->is_charge = true;
        }else{
            $charge->is_charge = false;
        }

        $charge->save();

        return response()->json(['data' => $charge]);
    }

    public function getReports(Request $request){

        $table = '';
        $from = date('Y-m-d', strtotime($request->start));
        $to = date('Y-m-d', strtotime($request->end));
        $report = TechReport::whereBetween('date_reported', [$from, $to])->orderBy('tsrf_no', 'asc')->get();

        $table .= '<table id="reporttbl" class="table table-bordered reporttbl">';
        $table .= '<thead>';
        $table .= '<tr>';
        if(Gate::allows('charging', Auth::user()->id)){
            $table .= '<th></th>';
        }
        $table .= '<th style="width: 59px;">TSRF No.</th>
                    <th style="width: 92px;">Reference No.</th>
                    <th>Department</th>
                    <th>ReportedBy</th>
                    <th>Problem Reported</th>
                    <th>Findings</th>
                    <th>Work Done</th>
                    <th>Technician On Duty</th>
                    <th>Encoded By</th>
                    <th>Action</th></tr>';
        $table .= '</thead><tbody>';
        foreach ($report as $reports) {
            $isCharge = ($reports->is_charge) ? 'checked':'';
            if(Gate::allows('charging', Auth::user()->id)){
                $table .= '<tr><td><input type="checkbox" data-id="'.$reports->id.'"  '.$isCharge.'></td>';
            }
            $table .='<td>'.$reports->tsrf_no.'</td>';
            $table .='<td>'.$reports->technicalReference->reference_no.'</td>';
            $table .='<td>'.$reports->department->department_name.'</td>';
            $table .='<td>'.$reports->reported_by.'</td>';
            // $table .='<td>'.$reports->date_reported->format('j F Y') .'</td>';
            $table .='<td>'.$reports->problem_reported.'</td>';
            $table .='<td>'.$reports->findings.'</td>';
            $table .='<td>'.$reports->work_done.'</td>';
            $table .='<td>'.$reports->techOnDuty->name.'</td>';
            $table .='<td>'.$reports->user->name.'</td>';
            $table .='<td><a href="javascript:void(0);" class="btn btn-xs btn-primary detail" data-id="'.$reports->id.'">View Details</a></td>';
            $table .='</tr>';
        }
        $table .='</tbody></table>';

        return response()->json(['data' => $table]);
    }

    public function searchReport(Request $request){

        $table = '';
        $keyword = $request->get('query');

        //search something with eager loading to reduce N+1 problem
        $query = TechReport::where('tsrf_no', 'like', '%'.$keyword.'%')
                        ->orWhereHas('department', function($q) use ($keyword){
                            $q->where('department_name', 'like', '%'.$keyword.'%');
                        })
                        ->orWhereHas('technicalReference', function($q) use ($keyword){
                            $q->where('reference_no', 'like', '%'.$keyword.'%');
                        })
                        ->limit(10)
                        ->get();


            $table .= '<table id="searchtbl" class="table table-bordered searchtbl">';
                $table .= '<thead>';
                    if(Auth::user()->role_id == 1){
                        $table .= '<th></th>';
                    }
                    $table .= '<th style="width: 59px;">TSRF No.</th>';
                    $table .= '<th style="width: 92px;">Reference No.</th>';
                    $table .= '<th>Department</th>';
                    $table .= '<th>ReportedBy</th>';
                    $table .= '<th>Date Reported</th>';
                    $table .= '<th>Problem Reported</th>';
                    $table .= '<th>Findings</th>';
                    $table .= '<th>Technician on Duty</th>';
                    $table .= '<th>Encoded By</th>';
                    $table .= '<th>Action</th>';
                $table .= '</thead>';
                $table .= '<tbody>';
                if(count($query) > 0){
                    foreach ($query as $result) {
                        $isCharge = ($result->is_charge) ? 'checked':'';
                        if(Auth::user()->role_id == 1){
                            $table .= '<tr><td><input type="checkbox" data-id="'.$result->id.'"  '.$isCharge.'></td>';
                        }
                        $table .='<td>'.$result->tsrf_no.'</td>';
                        $table .='<td>'.$result->technicalReference->reference_no.'</td>';
                        $table .='<td>'.$result->department->department_name.'</td>';
                        $table .='<td>'.$result->reported_by.'</td>';
                        $table .='<td>'.$result->date_reported.'</td>';
                        $table .='<td>'.$result->problem_reported.'</td>';
                        $table .='<td>'.$result->findings.'</td>';
                        $table .='<td>'.$result->techOnDuty->name.'</td>';
                        $table .='<td>'.$result->user->name.'</td>';
                        $table .='<td><a href="javascript:void(0);" class="btn btn-xs btn-primary detail" data-id="'.$result->id.'">View Details</a></td>';
                        $table .='</tr>';
                    }
                }
                // else{
                //     $table .= '<tr>';
                //     $table .= '<td class="text-center" colspan="11">No data available in the table</td>';
                //     $table .= '</tr>';
                // }
                $table .= '</tbody>';
            $table .= '</table>';
        return response()->json(['data' => $table]);
    }

    public function getDetails(Request $request){
        if($request->ajax()){
            $table = '';

            $tsrf_query_details = TechReport::find($request->id);

            $reportedAt = new Carbon($tsrf_query_details->date_reported);
            $signedAt = new Carbon($tsrf_query_details->date_signed);


            $table .='<table class="table table-bordered" style:"width:100%;">';
            $table .="<tr><td style='width: 50%;'>TSRF No.</td><td class='text-danger'>".$tsrf_query_details->tsrf_no."</td></tr>";
            $table .="<tr><td>Reference No.</td><td class='text-success'>".$tsrf_query_details->technicalReference->reference_no."</td></tr>";
            $table .="<tr><td>Department</td><td>".$tsrf_query_details->department->department_name."</td></tr>";
            $table .="<tr><td>Reported By</td><td>".$tsrf_query_details->reported_by."</td></tr>";
            $table .="<tr><td>Date Reported</td><td>".$reportedAt->format('l jS \of F Y')."</td></tr>";
            $table .="<tr><td>Reported Problem</td><td>".$tsrf_query_details->problem_reported."</td></tr>";
            $table .="<tr><td>Equipment No.</td><td>".$tsrf_query_details->equipment_no."</td></tr>";
            $table .="<tr><td>Date Purchased</td><td>".$tsrf_query_details->date_purchased."</td></tr>";
            $table .="<tr><td>Findings</td><td>".$tsrf_query_details->findings."</td></tr>";
            $table .="<tr><td>Work Done</td><td>".$tsrf_query_details->work_done."</td></tr>";
            $table .="<tr><td>User Signed</td><td>".$tsrf_query_details->user_signed."</td></tr>";
            $table .="<tr><td>Technician on duty</td><td>".$tsrf_query_details->techOnDuty->name."</td></tr>";
            $table .="<tr><td>Technician date signed</td><td>".$signedAt->format('l jS \of F Y')."</td></tr>";
            $table .="<tr><td>Encode By</td><td>".$tsrf_query_details->user->name."</td></tr>";
            $table .='</table>';
            return response()->json(['data' => $table]);
        }
    }
}
