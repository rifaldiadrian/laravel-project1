@extends('layout.main')
@section('title','Data Karyawan')
@section('content')
 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Data Karyawan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header pt-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="/karyawan/create" class="btn btn-primary btn-sm">Add New <i class="ml-2 fa fa-plus"></i></a>
                  <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables</h6> -->
                </div>
                <div class="table-responsive px-3 py-3">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Nomor Telp</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($dtKaryawan as $dtk)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dtk->nama_karyawan }}</td>
                        <td>{{ $dtk->jenis_kelamin }}</td>
                        <td>{{ $dtk->alamat }}</td>
                        <td>{{ $dtk->nomor_telp }}</td>
                        <td>
                          @if($dtk->active == 'Y')
                          <span class="badge badge-primary">Active</span>
                          @else
                          <span class="badge badge-danger">InActive</span>
                          @endif
                        </td>
                        <td class="text-center">
                          <a href="/karyawan/edit/{{ $dtk->id }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                          @if($dtk->active == 'Y')
                          <a href="/karyawan/activeInactive/{{ $dtk->id }}" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-ban"></i></a>
                          @else
                          <a href="/karyawan/activeInactive/{{ $dtk->id }}" class="btn btn-primary btn-sm" title="Active"><i class="fa fa-check"></i></a>
                          @endif
                          <a href="/karyawan/delete/{{ $dtk->id }}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
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

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
        @endsection