<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->integer('karyawan_id');
            $table->string('deksripsi');
            $table->date('tanggal_gaji');
            $table->integer('qty_jahitan');
            $table->integer('total_upah_jahitan');
            $table->integer('total_pinjaman');
            $table->integer('total_gaji');
            $table->enum('active',['Y','N']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji');
    }
};
