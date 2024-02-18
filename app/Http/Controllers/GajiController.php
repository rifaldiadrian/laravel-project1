<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Models\KaryawanModel;
use Illuminate\Support\Facades\DB;

class GajiController extends Controller
{
    function index(){
        $data = DB::table('gaji as a')
        ->join('karyawan as b', 'a.karyawan_id', '=', 'b.id')
        ->select('a.*', 'b.nama_karyawan as karyawanName')
        ->where('a.active','=','Y')
        ->where('b.active','=','Y')
        ->get();
        return view('Gaji.index',compact('data'));
    }
    function create(){
        $dataKaryawan = KaryawanModel::where('active','Y')->get();
        return view('Gaji.create',compact(['dataKaryawan']));
    }
}
