@extends('layout.main')
@section('title','Edit Pakaian')
@section('content')
 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Edit Pakaian</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/pakaian">Data Pakaian</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Pakaian</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-body">
                  <form action="/pakaian/update" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="labelName">Nama Pakaian</label>
                        <input type="hidden" name="id" id="" value="{{ $data->id }}">
                        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="" value="{{ $data->name }}">
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="labelKategori">Kategori Pakaian</label>
                        <select class="@error('kategoriPakaian') is-invalid @enderror form-control" name="kategoriPakaian" id="kategoriPakaian">
                            <option value="">--Pilih Kategori Pakaian--</option>
                            @foreach($dataKategori as $dk)
                            <option value="{{ $dk->id }}" @if($dk->id == $data->kategori_pakaian_id) selected @endif >{{ $dk->name }}</option>
                            </optgroup>
                            @endforeach
                          </select>
                        @error('kategoriPakaian')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="labelName">Harga Upah Jahit</label>
                        <input type="number" name="hargaUpahJahit" class="@error('hargaUpahJahit') is-invalid @enderror form-control" placeholder="" value="{{ $data->harga_upah_jahit }}">
                        @error('hargaUpahJahit')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="labelName">Harga Upah Jual</label>
                        <input type="number" name="hargaUpahJual" class="@error('hargaUpahJual') is-invalid @enderror form-control" placeholder="" value="{{ $data->harga_upah_jual }}">
                        @error('hargaUpahJual')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="action float-right">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a class="btn btn-secondary text-white" href="/pakaian">Batal</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <!--Row-->

        </div>
        <!---Container Fluid-->
        @endsection