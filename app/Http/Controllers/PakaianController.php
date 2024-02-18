<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pakaian;
use App\Models\KategoriPakaian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PakaianController extends Controller
{
    function index(){
        $data = DB::table('pakaian as a')
        ->join('kategori_pakaian as b', 'a.kategori_pakaian_id', '=', 'b.id')
        ->select('a.*', 'b.name as kategoriName')
        ->where('a.active','=', 'Y')
        ->where('b.active','=', 'Y')
        ->get();
        return view('Pakaian.index',compact('data'));
    }

    function create(){
        $dataKategori = KategoriPakaian::where('active','Y')->get();
        return view('Pakaian.create',compact('dataKategori'));
    }
    function edit($id){
        $data = Pakaian::find($id);
        $dataKategori = KategoriPakaian::where('active','Y')->get();
        return view('Pakaian.edit',compact(['data','dataKategori']));
    }
    function store(Request $request){
        // Validation
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'kategoriPakaian' => 'required',
            'hargaUpahJahit' => 'required|integer',
            'hargaUpahJual' => 'required|integer',
        ]);

        if ($validated->fails()) {
                return redirect('/pakaian/create')
                ->withErrors($validated)
                ->withInput();
        }else{
            $pakaian = new Pakaian();
            // Assign Variable
            $pakaian->name = $request->name;
            $pakaian->kategori_pakaian_id = $request->kategoriPakaian;
            $pakaian->harga_upah_jahit = $request->hargaUpahJahit;
            $pakaian->harga_upah_jual = $request->hargaUpahJual;
            $pakaian->active = "Y";
            // Validation Nama Karyawan Is Exist?
            $IsExist = Pakaian::where([
                ['name',$request->name],
                ['kategori_pakaian_id',$request->kategoriPakaian],
                ['active','Y']
            ])->get();
            if(count($IsExist) > 0){
                $msg = "Data pakaian sudah ada!";
                return redirect('/pakaian/create')
                ->withErrors($msg)
                ->withInput();
            }else{
                $pakaian->save();
                return redirect('pakaian')->with('success','Pakaian berhasil ditambahkan!');
            }
        }
    }
    function update(Request $request){
        // Validation
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'kategoriPakaian' => 'required',
            'hargaUpahJahit' => 'required|integer',
            'hargaUpahJual' => 'required|integer',
        ]);

        if ($validated->fails()) {
                return redirect('/pakaian/edit/'.$request->id)
                ->withErrors($validated)
                ->withInput();
        }else{
            $pakaian = Pakaian::find($request->id);
            // No Data Changed?
            if($pakaian->name == $request->name && $pakaian->kategori_pakaian_id == $request->kategoriPakaian && $pakaian->harga_upah_jahit == $request->hargaUpahJahit && $pakaian->harga_upah_jual == $request->hargaUpahJual){
                return redirect('pakaian')->with('warning','Tidak ada perubahan data!');
            }

            // Assign Variable
            $pakaian->name = $request->name;
            $pakaian->kategori_pakaian_id = $request->kategoriPakaian;
            $pakaian->harga_upah_jahit = $request->hargaUpahJahit;
            $pakaian->harga_upah_jual = $request->hargaUpahJual;
            $pakaian->updated_at = date('Y-m-d H:i:s');
            // Validation Nama Karyawan Is Exist?
            $IsExist = Pakaian::where([
                ['name',$request->name],
                ['kategori_pakaian_id',$request->kategoriPakaian],
                ['id','<>',$request->id],
                ['active','Y']
            ])->get();
            if(count($IsExist) > 0){
                $msg = "Data pakaian sudah ada!";
                return redirect('/pakaian/edit/'.$request->id)
                ->withErrors($msg)
                ->withInput();
            }else{
                $pakaian->update();
                return redirect('pakaian')->with('success','Pakaian berhasil diedit!');
            }
        }
    }
}
