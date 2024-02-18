@extends('layout.main')
@section('title','Data Kategori Pakaian')
@section('content')
 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Data Kategori Pakaian</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Kategori Pakaian</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header pt-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="/kategoriPakaian/create" class="btn btn-primary btn-sm">Tambah Data <i class="ml-2 fa fa-plus"></i></a>
                  <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables</h6> -->
                </div>
                <div class="table-responsive px-3 py-3">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th class="text-center" style="width:5%;">No</th>
                        <th class="text-center">Kategori Pakaian</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $dtk)
                      <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $dtk->name }}</td>
                        <td class="text-center">
                          <a href="/kategoriPakaian/edit/{{ $dtk->id }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                          <!-- <a href="/kategoriPakaian/delete/{{ $dtk->id }}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
                          <button type="button" data-toggle="modal" data-target="#exampleModal" id="#btnDelete" onclick="setValueID('{{ $dtk->id }}')" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></button>
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Konfirmasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Anda yakin ingin menghapus data ini ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" onclick="submitData()">Hapus</button>
                  <button type="button" class="btn btn-secondary text-white" data-dismiss="modal" onclick="clearValueID()">Batal</button>
                </div>
              </div>
            </div>
          </div>
          <!---Container Fluid-->

          <!-- JS -->
          <script>
            var dataID;
            function setValueID(id){
              dataID = id;
              console.log(id);
            }

            function clearValueID(){
              dataID = undefined;
            }
            function submitData(){
              if(dataID !== undefined){
                $.ajax({
                    type: "POST",
                    url: "/kategoriPakaian/delete/",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': dataID
                    },
                    success: function(rest) {
                      window.location.reload(true);
                    }
                })
              }
            }
          </script>
        @endsection