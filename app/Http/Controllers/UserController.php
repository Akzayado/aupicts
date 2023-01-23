<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\TechReport;
use App\Models\Role;
use DB;
class UserController extends Controller
{
    //

    public function index(){
        $users = User::where('status', 1)->whereIn('auth_level', [1,2,3])->get();
        $roles = Role::select('id','role')
        ->where('department_id', 59)
        ->get();
        return view('manage.users.users', compact('users', 'roles'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required',
            'auth_lvl' => 'required',
            'password' => 'required',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role,
            'auth_level' => $request->auth_lvl,
            'password' => Hash::make($request->password),
        ]);


        return response()->json(['status' => 200]);
    }

    public function edit(Request $request, $id){

        $tech_reports = User::findOrFail($id);

        return response()->json(['data' => $tech_reports]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'role' => 'required',
            'auth_lvl' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->role_id = $request->role;
        $user->auth_level = $request->auth_lvl;
        $user->save();

        return response()->json(['message' => "Successfuly updated!"]);
    }

    public function destroy($id){

        $delete_user = User::where('id', '=', $id)->delete();
        // $delete_user->destroy();
        return response()->json(['success' => 'Data has been deleted.']);
    }
    public function resetPassword(Request $request){
        $request->validate([
            'password' => [
                'required',
                'min:6',
                // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                // 'confirmed'
            ]
        ]);

        $reset_password = User::find($request->id);

        $reset_password->password = Hash::make($request->password);
        $reset_password->save();

        return response()->json(['success' => 'Password has been resetted.', 'data' => $request->all()]);
    }
}
