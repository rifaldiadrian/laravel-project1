@extends('layout.main')
@section('title','Profile')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h1 class="h3 mb-0 text-gray-800">Profile Saya</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profile Saya</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-4">
      <div class="card mb-4">
        <div class="card-body">
          <div class="div-image text-center">
            <img src="img/boy.png" style="max-width: 250px;border:1px solid grey;" class="img-profile rounded-circle">
            <h6 for="lable-name" class="mt-2">Rifaldi Adrian</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="card mb-4">
        <div class="card-body">
          <form action="/karyawan/store" method="POST">
            @csrf
            <div class="form-group">
              <label for="labelNamaKaryawan">Nama Saya</label>
              <input type="text" name="name" class="form-control" placeholder="" required value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
              <label for="labelAlamatKaryawan">Email</label>
              <input type="email" name="email" class="form-control" placeholder="" required value="{{ Auth::user()->email }}">
            </div>
            <div class="action float-right">
              <button type="submit" class="btn btn-success">Edit</button>
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