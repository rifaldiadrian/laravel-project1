<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pelangganModel;
use App\Models\KaryawanModel;
class DashboardController extends Controller
{
    function dashboard(){
        $countPelanggan = pelangganModel::all()->count();
        $countKaryawan = KaryawanModel::all()->count();
        return view('admin.dashboard',compact(['countPelanggan','countKaryawan']));
    }
    function profile(){
        return view('action.profile');
    }
    function login(){
        return view('layouts.login');
    }
}
