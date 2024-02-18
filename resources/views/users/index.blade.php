@extends('layout.main')
@section('title','Data Users')
@section('content')
 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Data Users</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Users</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header pt-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="/users/create" class="btn btn-primary btn-sm">Add New <i class="ml-2 fa fa-plus"></i></a>
                  <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables</h6> -->
                </div>
                <div class="table-responsive px-3 py-3">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Email User</th>
                        <th>Role</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($Users as $usr)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $usr->name }}</td>
                        <td>{{ $usr->email }}</td>
                        <td>{{ $usr->rolename }}</td>
                        <td class="text-center">
                          <a href="/users/edit/{{ $usr->id }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                          <a href="/users/delete/{{ $usr->id }}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
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