@extends('layout.main')
@section('title','Edit Kategori Pakaian')
@section('content')
 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Edit Kategori Pakaian : {{ $data->name }}</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/kategoriPakaian">Data Kategori Pakaian</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Kategori Pakaian</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-body">
                  <form action="/kategoriPakaian/update" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}" id="">
                    <div class="form-group">
                        <label for="labelName">Kategori Pakaian</label>
                        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" value="{{ $data->name }}" placeholder="">
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="action float-right">
                        <button type="submit" class="btn btn-warning">Edit</button>
                        <a class="btn btn-secondary text-white" href="/kategoriPakaian">Batal</a>
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