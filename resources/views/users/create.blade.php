@extends('layout.main')
@section('title','Tambah Users')
@section('content')
 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h1 class="h3 mb-0 text-gray-800">Tambah Users</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/users">Data Users</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Users</li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-body">
                  <form action="/users/store" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="labelNamaUsers">Nama User</label>
                        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="Masukan nama user" value="{{ old('name') }}" required>
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="labelNomorPonsel">Nomor Ponsel</label>
                        <input type="text" name="nomor_ponsel" class="@error('nomor_ponsel') is-invalid @enderror form-control" placeholder="Masukan nomor ponsel" value="{{ old('nomor_ponsel') }}" required>
                        @error('nomor_ponsel')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="labelEmail">Email</label>
                        <input type="email" class="@error('email') is-invalid @enderror form-control" id="exampleFormControlInput1"
                        placeholder="Masukan email user" value="{{ old('email') }}" required name="email">
                        @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="labelJenisKelamin">Role</label>
                        <select name="master_role_id" class="@error('master_role_id') is-invalid @enderror form-control" required>
                            <option value="">Pilih</option>
                            @foreach($masterRole as $mr)
                            <option value="{{ $mr->id }}" @if ( old("master_role_id")==$mr->id ) selected @endif>{{ $mr->name }}</option>
                            @endforeach
                        </select>
                        @error('master_role_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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