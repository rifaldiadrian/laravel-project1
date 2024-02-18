@extends('layout.main')
@section('title','Edit Karyawan')
@section('content')
 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Edit Karyawan : {{ $dtKaryawan->nama_karyawan }}</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/karyawan">Data Karyawan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Karyawan</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-body">
                  <form action="/karyawan/update" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $dtKaryawan->id }}" id="">
                    <div class="form-group">
                        <label for="labelNamaKaryawan">Nama Karyawan</label>
                        <input type="text" name="nama_karyawan" class="form-control" value="{{ $dtKaryawan->nama_karyawan }}" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="labelJenisKelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="Laki Laki" @if($dtKaryawan->jenis_kelamin == "Laki Laki") selected @endif >Laki Laki</option>
                            <option value="Perempuan" @if($dtKaryawan->jenis_kelamin == "Perempuan") selected @endif >Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelAlamatKaryawan">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $dtKaryawan->alamat }}" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="labelNomorTelp">Nomor Telp</label>
                        <input type="text" name="nomor_telp" class="form-control" value="{{ $dtKaryawan->nomor_telp }}" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="labelNomorTelp">Status User</label>
                        <div class="custom-control custom-switch">
                        <input type="checkbox" name="isActive" class="custom-control-input" id="customSwitch1" @if($dtKaryawan->active == "Y") checked @endif>
                        <label class="custom-control-label" for="customSwitch1"></label>
                      </div>
                    </div>
                    <div class="action float-right">
                        <button type="submit" class="btn btn-primary">Update</button>
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