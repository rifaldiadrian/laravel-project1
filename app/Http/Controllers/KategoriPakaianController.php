<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPakaian;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class KategoriPakaianController extends Controller
{
    function index(){
        $data = KategoriPakaian::where('active','Y')->get();
        return view('KategoriPakaian.index',compact('data'));
    }
    function create(){
        return view('KategoriPakaian.create');
    }
    function edit($id){
        $data = KategoriPakaian::find($id);
        return view('KategoriPakaian.edit',compact('data'));
    }
    function store(Request $request){
        // Validation
        $validated = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if ($validated->fails()) {
                return redirect('/kategoriPakaian/create')
                ->withErrors($validated)
                ->withInput();
        }else{
            $kategori = new KategoriPakaian;
            // Assign Variable
            $kategori->name = $request->name;
            $kategori->active = "Y";
            // Validation Nama Karyawan Is Exist?
            $IsExist = KategoriPakaian::where([
                ['name',$request->name],
                ['active','Y']
            ])->get();
            if(count($IsExist) > 0){
                $msg = "Data kategori sudah ada!";
                return redirect('/kategoriPakaian/create')
                ->withErrors($msg)
                ->withInput();
            }else{
                $kategori->save();
                return redirect('kategoriPakaian')->with('success','Kategori Pakaian berhasil ditambahkan!');
            }
        }
    }
    function update(Request $request){
        // Validation
        $validated = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if ($validated->fails()) {
                return redirect('/kategoriPakaian/edit/'.$request->id)
                ->withErrors($validated)
                ->withInput();
        }else{
            $kategori = KategoriPakaian::find($request->id);
            // Assign Variable
            if($kategori->name == $request->name){
                return redirect('kategoriPakaian')->with('warning','Tidak ada perubahan data!');
            }
            $kategori->name = $request->name;
            $kategori->updated_at = date('Y-m-d H:i:s');
            // Validation Nama Karyawan Is Exist?
            $IsExist = KategoriPakaian::where([
                ['name',$request->name],
                ['name','<>',$request->id],
                ['active','Y']
            ])->get();
            if(count($IsExist) > 0){
                $msg = "Data kategori sudah ada!";
                return redirect('/kategoriPakaian/edit/'.$request->id)
                ->withErrors($msg)
                ->withInput();
            }else{
                $kategori->update();
                return redirect('kategoriPakaian')->with('success','Kategori Pakaian berhasil diedit!');
            }
        }
    }
    function delete(Request $request){
        $data = KategoriPakaian::find($request->id);
        $data->delete();
        // return redirect('kategoriPakaian');
        // return redirect('kategoriPakaian')->with('success','Kategori Pakaian berhasil dihapus!');
        // return $request->id;
    }
}
