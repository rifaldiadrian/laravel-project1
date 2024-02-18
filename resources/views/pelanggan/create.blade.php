@extends('layout.main')
@section('title','Tambah Pelanggan')
@section('content')
 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Tambah Pelanggan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/pelanggan">Data Pelanggan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Pelanggan</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-body">
                  <form action="/pelanggan/store" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="labelNamaPelanggan">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="labelJenisKelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="Laki Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelAlamatPelanggan">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="labelNomorTelp">Nomor Telp</label>
                        <input type="text" name="nomor_telp" class="form-control" placeholder="" required>
                    </div>
                    <div class="action float-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
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