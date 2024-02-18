<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelangganModel extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = ['nama_pelanggan','jenis_kelamin','alamat','nomor_telp','active'];
}
