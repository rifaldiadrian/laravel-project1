@extends('layout.main')
@section('title','Tambah Gaji')
@section('content')
<style>
  th {
  position: sticky;
  top: 0px;  /* 0px if you don't have a navbar, but something is required */
  background: white;
  text-align: center;
}
.table-detail{
  margin-top: 0;
}
.table-responsive::-webkit-scrollbar{
  width: 10px;
}
.table-responsive::-webkit-scrollbar-track{
  background-color: whitesmoke;
}
.table-responsive::-webkit-scrollbar-thumb{
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
.table-responsive{
  scrollbar-width: thin;
  scrollbar-color: #6969dd #e0e0e0;
}
</style>
 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Tambah Gaji</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/gaji">Data Gaji</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Gaji</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- Form Input -->
            <div class="col-lg-5">
              <div class="card mb-4">
                <div class="card-body">
                  <form action="/gaji/store" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="labelkaryawan">Nama Karyawan</label>
                        <select class="@error('karyawan') is-invalid @enderror select2-single-placeholder form-control" name="karyawan" id="select2SinglePlaceholder">
                            <option value=""></option>
                            @foreach($dataKaryawan as $dk)
                            <option value="{{ $dk->id }}" @if($dk->id == old('karyawan')) selected @endif >{{ $dk->nama_karyawan }}</option>
                            </optgroup>
                            @endforeach
                          </select>
                        @error('karyawan')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="labelName">Deskripsi</label>
                        <input type="text" name="deskripsi" class="@error('deskripsi') is-invalid @enderror form-control" placeholder="">
                        @error('deskripsi')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group" id="simple-date1">
                      <label for="simpleDataInput">Tanggal Gaji</label>
                      <div class="input-group date">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" id="simpleDataInput">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Detail Gaji -->
            <div class="col-lg-7">
              <div class="card mb-4">
                <div class="card-body">
                <div class="card-header py-2 px-0 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list"></i> List Jahitan</h6>
                  <div class="">
                    <a class="m-0 float-right btn btn-primary btn-sm" href="#">Tambah Data <i class="ml-1 fas fa-plus"></i></a>
                  </div>
                </div>
                <div class="table-responsive" style="max-height:300px;">
                  <table class="table align-items-center table-flush table-hover table-bordered table-detail" id="">
                    <thead class="thead-light">
                      <tr>
                        <th>Act</th>
                        <th>Nama Pakaian</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center"><a href="#" class="text-danger" title="Hapus"><i class="fa fa-trash"></i></a></td>
                        <td>PDH Lengan Pendek</td>
                        <td class="text-center">22 Item</td>
                        <td class="text-right">Rp.125.000</td>
                        <td class="text-right">
                        <a href="#" class="text-info" data-toggle="popover" title="Keterangan" data-content="Ada tambahan upah permak baju Rp.231.000"><i class="fa fa-info-circle"></i></a>
                          Rp.225.000
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="#" class="text-danger" title="Hapus"><i class="fa fa-trash"></i></a></td>
                        <td>PDL Lengan Panjang</td>
                        <td class="text-center">22 Item</td>
                        <td class="text-right">Rp.125.000</td>
                        <td class="text-right">
                          Rp.225.000
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="#" class="text-danger" title="Hapus"><i class="fa fa-trash"></i></a></td>
                        <td>PDL Lengan Panjang</td>
                        <td class="text-center">22 Item</td>
                        <td class="text-right">Rp.125.000</td>
                        <td class="text-right">
                          Rp.225.000
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="#" class="text-danger" title="Hapus"><i class="fa fa-trash"></i></a></td>
                        <td>PDL Lengan Panjang</td>
                        <td class="text-center">22 Item</td>
                        <td class="text-right">Rp.125.000</td>
                        <td class="text-right">
                          Rp.225.000
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="#" class="text-danger" title="Hapus"><i class="fa fa-trash"></i></a></td>
                        <td>PDL Lengan Panjang</td>
                        <td class="text-center">22 Item</td>
                        <td class="text-right">Rp.125.000</td>
                        <td class="text-right">
                          Rp.225.000
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="#" class="text-danger" title="Hapus"><i class="fa fa-trash"></i></a></td>
                        <td>PDL Lengan Panjang</td>
                        <td class="text-center">22 Item</td>
                        <td class="text-right">Rp.125.000</td>
                        <td class="text-right">
                          Rp.225.000
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="#" class="text-danger" title="Hapus"><i class="fa fa-trash"></i></a></td>
                        <td>PDL Lengan Panjang</td>
                        <td class="text-center">22 Item</td>
                        <td class="text-right">Rp.125.000</td>
                        <td class="text-right">
                          Rp.225.000
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="divTotal py-3 px-3">
                  <div class="divQty mb-2">
                    <div class="row d-flex flex-row align-items-center justify-content-between">
                      <div class="text-right" style="width: 55%;">Qty Jahitan : </div>
                      <div class="text-right">40 Items </div>
                    </div>
                  </div>
                  <div class="divTotalJahitan mb-2">
                      <div class="row d-flex flex-row align-items-center justify-content-between">  
                        <div class="text-right" style="width: 55%;">Total Upah : </div>
                        <div class="text-right">Rp.1.200.000 </div>
                      </div>
                  </div>
                  <div class="divTotalJahitan mb-2">
                      <div class="row d-flex flex-row align-items-center justify-content-between">  
                        <div class="text-right" style="width: 55%;">Total Pinjaman : </div>
                        <div class=""><input type="number" value="" style="width: 100%;text-align:right;"></div>
                      </div>
                  </div>
                  <hr>
                  <div class="row d-flex flex-row align-items-center justify-content-between">
                      <h4><b>Total Gaji : Rp.2.215.000 </b></h4>
                      <div class="">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/gaji" class="btn btn-secondary text-white">Batal</a>
                        <a href="#" class="btn btn-danger text-white" title="Download Slip Gaji"><i class="fa fa-download"></i></a>
                      </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
        </div>
        <!--Row-->

        </div>

        <script>
          function setDate(){
            var nowDate = new Date();
            let day = nowDate.getDate();
            let month = nowDate.getMonth();
            let year = nowDate.getFullYear();
            $('#simpleDataInput').val(day + '/' + (month+1) + '/' + year);
          }
          setDate();
        </script>
        <!---Container Fluid-->
        @endsection