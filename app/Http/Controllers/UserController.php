<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index(){
        // $Users = User::all();
        $Users = DB::table('users')
        ->select('users.id','users.name','users.email','master_role.name as rolename')
        ->join('master_role', function (JoinClause $join) {
            $join->on('users.master_role_id', '=', 'master_role.id');
        })
        ->get();
        return view('users.index',compact('Users'));
    }
    function create(){
        $masterRole = RoleModel::where('active','=','Y')->get();
        return view('users.create',compact('masterRole'));
    }
    function store(Request $request){
        $validated = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'nomor_ponsel' => ['required', 'numeric','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'master_role_id' => ['required'],
        ]);
        if ($validated->fails()) {
            return redirect('/users/create')
                ->withErrors($validated)
                ->withInput();
        }else{
                $user = new User();
                $password = "userdubus123";
                // Assign Variable
                $user->name = $request->name;
                $user->nomor_ponsel = $request->nomor_ponsel;
                $user->email = $request->email;
                $user->master_role_id = $request->master_role_id;
                $user->password =  Hash::make($password);
                $user->active = "Y";
                // Validation Nama Karyawan Is Exist?
                $IsExist = User::where([
                    ['name',$request->name],
                    ['nomor_ponsel',$request->nomor_ponsel]
                ])->get();
                if(count($IsExist) > 0){
                    $msg = "Users sudah terdaftar !";
                    return redirect('/user/create')
                    ->withErrors($msg)
                    ->withInput();
                    // return response()->json([
                    //     "message" => "User Already Exist!",
                    // ],201);
                }else{
                    $user->save();
                    return redirect('users')->with('success','User berhasil ditambahkan!');
                }
            }
    }
    function edit($id){
        $dtUser = User::find($id);
        $masterRole = RoleModel::where('active','=','Y')->get();
        return view('users.edit',compact(['dtUser','masterRole']));
    }
    function update(Request $request){
        dd($request);
        $validated = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'nomor_ponsel' => ['required', 'numeric','unique:users,nomor_ponsel,'.$request->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->id],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'master_role_id' => ['required'],
        ]);
        if ($validated->fails()) {
            return redirect('/users/create')
                ->withErrors($validated)
                ->withInput();
        }else{
                $user = new User();
                $password = "userdubus123";
                // Assign Variable
                $user->name = $request->name;
                $user->nomor_ponsel = $request->nomor_ponsel;
                $user->email = $request->email;
                $user->master_role_id = $request->master_role_id;
                $user->password =  Hash::make($password);
                $user->active = "Y";
                // Validation Nama Karyawan Is Exist?
                $IsExist = User::where([
                    ['name',$request->name],
                    ['nomor_ponsel',$request->nomor_ponsel]
                ])->get();
                if(count($IsExist) > 0){
                    $msg = "Users sudah terdaftar !";
                    return redirect('/user/create')
                    ->withErrors($msg)
                    ->withInput();
                    // return response()->json([
                    //     "message" => "User Already Exist!",
                    // ],201);
                }else{
                    $user->save();
                    return redirect('users')->with('success','User berhasil ditambahkan!');
                }
            }
    }
}
