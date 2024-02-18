@extends('layout.main')
@section('title','Data Gaji')
@section('content')
 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Data Gaji</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Gaji</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header pt-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="/gaji/create" class="btn btn-primary btn-sm">Tambah Data <i class="ml-2 fa fa-plus"></i></a>
                  <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables</h6> -->
                </div>
                <div class="table-responsive px-3 py-3">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Gaji</th>
                        <th>Karyawan</th>
                        <th>Total Gaji</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $dtg)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dtg->deskripsi }}</td>
                        <td>{{ $dtg->karyawanName }}</td>
                        <td class="text-right">Rp.{{ number_format($dtg->total_gaji) }}</td>
                        <td class="text-center">
                          <a href="/pakaian/edit/{{ $dtg->id }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                          <a href="/pakaian/delete/{{ $dtg->id }}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->
        </div>
        <!---Container Fluid-->
        @endsection