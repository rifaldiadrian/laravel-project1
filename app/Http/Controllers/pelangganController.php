<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pelangganModel;
use Illuminate\Support\Facades\Validator;
class pelangganController extends Controller
{
    function index(){
        $dtPelanggan = pelangganModel::all();
        return view('pelanggan.index',compact(['dtPelanggan']));
    }
    function create(){
        return view('pelanggan.create');
    }
    function store(Request $request){
        // Validation
        $validated = Validator::make($request->all(),[
            'nama_pelanggan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nomor_telp' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json([
                "message" => "Please require fill",
            ],201);
        }else{
            $pelanggan = new pelangganModel;
            // Assign Variable
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
            $pelanggan->jenis_kelamin = $request->jenis_kelamin;
            $pelanggan->alamat = $request->alamat;
            $pelanggan->nomor_telp = $request->nomor_telp;
            $pelanggan->active = "Y";
            // Validation Nama pelanggan Is Exist?
            $IsExist = pelangganModel::where([
                ['nama_pelanggan',$request->nama_pelanggan],
                ['nomor_telp',$request->nomor_telp]
            ])->get();
            if(count($IsExist) > 0){
                $msg = "Pelanggan sudah terdaftar !";
                return redirect('/pelanggan/create')
                ->withErrors($msg)
                ->withInput();
                // return response()->json([
                //     "message" => "User Already Exist!",
                // ],201);
            }else{
                $pelanggan->save();
                return redirect('pelanggan')->with('success','Pelanggan berhasil ditambahkan!');
                // return response()->json([
                //     "message" => "Create User Successfully",
                // ],201);   
            }
        }
    }
    function edit($id){
        $dtPelanggan = pelangganModel::find($id);
        if(!is_null($dtPelanggan)){
            return view('pelanggan.edit',compact(['dtPelanggan']));
        }
    }
    function update(Request $request){
        // Validation
        $validated = Validator::make($request->all(),[
            'nama_pelanggan' => 'required',
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
            $pelanggan = pelangganModel::find($request->id);
            // Assign Variable
            if($pelanggan->nama_pelanggan != $request->nama_pelanggan){
                $flag = 1;
            }
            if($pelanggan->jenis_kelamin != $request->jenis_kelamin){
                $flag = 1;
            }
            if($pelanggan->alamat != $request->alamat){
                $flag = 1;
            }
            if($pelanggan->nomor_telp != $request->nomor_telp){
                $flag = 1;
            }
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
            $pelanggan->jenis_kelamin = $request->jenis_kelamin;
            $pelanggan->alamat = $request->alamat;
            $pelanggan->nomor_telp = $request->nomor_telp;
            // Validation Nama Karyawan Is Exist?
            $IsExist = pelangganModel::where([
                ['nama_pelanggan',$request->nama_pelanggan],
                ['nomor_telp',$request->nomor_telp]
            ])->get()->first();
            if(!is_null($IsExist) && $IsExist->id != $request->id){
                $msg = "Pelanggan sudah terdaftar !";
                return redirect('/pelanggan/edit/'.$request->id)
                ->withErrors($msg)
                ->withInput();
            }else{
                if($flag == 0){
                    $pelanggan->update();
                    return redirect('pelanggan')->with('warning','Tidak ada perubahan data!');
                }
                $pelanggan->update();
                return redirect('pelanggan')->with('success','Update pelanggan berhasil!');
                // return response()->json([
                //     "message" => "Create User Successfully",
                // ],201);   
            }
        }
    }
    function delete($id){
        $dtPelanggan = pelangganModel::find($id);
        if(!is_null($dtPelanggan)){
            $dtPelanggan->delete();
            return back()->with('success','Pelanggan berhasil dihapus!');
        }
    }
}
