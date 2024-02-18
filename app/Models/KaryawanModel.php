<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = ['nama_karyawan','jenis_kelamin','alamat','nomor_telp','active'];
}
