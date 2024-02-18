<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaryawanModel;
use Illuminate\Support\Facades\Validator;
class KaryawanController extends Controller
{
    function index(){
        $dtKaryawan = KaryawanModel::all();
        return view('karyawan.index',compact('dtKaryawan'));
    }
    function create(){
        return view('karyawan.create');
    }
    function edit($id){
        $dtKaryawan = KaryawanModel::find($id);
        if(!is_null($dtKaryawan)){
            return view('karyawan.edit',compact(['dtKaryawan']));
        }
    }
    function store(Request $request){
        // Validation
        $validated = Validator::make($request->all(),[
            'nama_karyawan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nomor_telp' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json([
                "message" => "Please require fill",
            ],201);
        }else{
            $karyawan = new KaryawanModel;
            // Assign Variable
            $karyawan->nama_karyawan = $request->nama_karyawan;
            $karyawan->jenis_kelamin = $request->jenis_kelamin;
            $karyawan->alamat = $request->alamat;
            $karyawan->nomor_telp = $request->nomor_telp;
            $karyawan->active = "Y";
            // Validation Nama Karyawan Is Exist?
            $IsExist = KaryawanModel::where([
                ['nama_karyawan',$request->nama_karyawan],
                ['nomor_telp',$request->nomor_telp]
            ])->get();
            if(count($IsExist) > 0){
                $msg = "Karyawan sudah terdaftar !";
                return redirect('/karyawan/create')
                ->withErrors($msg)
                ->withInput();
                // return response()->json([
                //     "message" => "User Already Exist!",
                // ],201);
            }else{
                $karyawan->save();
                return redirect('karyawan')->with('success','Karyawan berhasil ditambahkan!');
                // return response()->json([
                //     "message" => "Create User Successfully",
                // ],201);   
            }
        }
    }
    function update(Request $request){
        // Validation
        $validated = Validator::make($request->all(),[
            'nama_karyawan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nomor_telp' => 'required'
        ]);

        if ($validated->fails()) {
            return response()->json([
                "message" => "Please require fill",
            ],201);
        }else{
            $flag = 0;
            $karyawan = KaryawanModel::find($request->id);
            // Assign Variable
            if($karyawan->nama_karyawan != $request->nama_karyawan){
                $flag = 1;
            }
            if($karyawan->jenis_kelamin != $request->jenis_kelamin){
                $flag = 1;
            }
            if($karyawan->alamat != $request->alamat){
                $flag = 1;
            }
            if($karyawan->nomor_telp != $request->nomor_telp){
                $flag = 1;
            }
            $karyawan->nama_karyawan = $request->nama_karyawan;
            $karyawan->jenis_kelamin = $request->jenis_kelamin;
            $karyawan->alamat = $request->alamat;
            $karyawan->nomor_telp = $request->nomor_telp;
            if(@$request->isActive){
                if($karyawan->active != "Y"){
                    $flag = 1;
                }
                $karyawan->active = "Y";
            }else{
                if($karyawan->active != "N"){
                    $flag = 1;
                }
                $karyawan->active = "N";
            }
            // Validation Nama Karyawan Is Exist?
            $IsExist = KaryawanModel::where([
                ['nama_karyawan',$request->nama_karyawan],
                ['nomor_telp',$request->nomor_telp]
            ])->get()->first();
            if(!is_null($IsExist) && $IsExist->id != $request->id){
                $msg = "Karyawan sudah terdaftar !";
                return redirect('/karyawan/edit/'.$request->id)
                ->withErrors($msg)
                ->withInput();
                // return response()->json([
                //     "message" => "User Already Exist!",
                // ],201);
            }else{
                if($flag == 0){
                    $karyawan->update();
                    return redirect('karyawan')->with('warning','Tidak ada perubahan data!');
                }
                $karyawan->update();
                return redirect('karyawan')->with('success','Update karyawan berhasil!');
                // return response()->json([
                //     "message" => "Create User Successfully",
                // ],201);   
            }
        }
    }
    function activeInactive($id){
        $dtKaryawan = KaryawanModel::find($id);
        if(!is_null($dtKaryawan)){
            if($dtKaryawan->active == "Y"){
                $dtKaryawan->active = "N";
                $msg = "User berhasil di aktifkan!";
            }else{
                $dtKaryawan->active = "Y";
                $msg = "User berhasil di non-aktifkan!";
            }
            $dtKaryawan->update();
            return back()->with('success',$msg);
        }
    }
    function delete($id){
        $dtKaryawan = KaryawanModel::find($id);
        if(!is_null($dtKaryawan)){
            $dtKaryawan->delete();
            return back()->with('success','User berhasil dihapus!');
        }
    }
    /* API */
    function dataKaryawan(){
        $dtKaryawan = KaryawanModel::all();
        return response()->json($dtKaryawan);
    }
    
}
