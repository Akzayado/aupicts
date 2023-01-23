<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.department.department');
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
        $request->validate([
            'account_code' => 'required',
            'department' => 'required',
        ]);

        $department = new Department;
        $department->account_code = $request->account_code;
        $department->department_name = $request->department;
        $department->save();

        return response()->json(['data' => $request->all()]);
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
        //
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
        //
        $update_department = Department::find($id);

        $update_department->account_code = $request->account_code;
        $update_department->department_name = $request->department;
        $update_department->save();

        return response()->json(['data' => $request->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDepartment(){

        $department = Department::all();
        $html = '';

        foreach ($department as $departments) {
            $html .= '<tr data-id="'. $departments->id .'">';
            $html .= '<td>'.$departments->account_code.'</td>';
            $html .= '<td>'.$departments->department_name.'</td>';
            $html .= '</tr>';
        }

        return response()->json(['data' => $html]);
    }
}
