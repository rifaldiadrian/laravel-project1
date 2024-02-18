<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pakaian extends Model
{
    use HasFactory;
    protected $table = 'pakaian';
    protected $fillable = ['name','kategori_pakaian_id','harga_upah_jahit','harga_upah_jual'];
    
}