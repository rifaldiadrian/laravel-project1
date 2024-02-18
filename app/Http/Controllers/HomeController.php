<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\pelangganModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countPelanggan = pelangganModel::all()->count();
        return view('admin.dashboard', compact(['countPelanggan']));
    }
}
