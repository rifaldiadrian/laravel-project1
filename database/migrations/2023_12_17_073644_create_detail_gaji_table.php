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
        Schema::create('detail_gaji', function (Blueprint $table) {
            $table->id();
            $table->integer('gaji_id');
            $table->integer('pakaian_id');
            $table->integer('qty');
            $table->integer('harga_upah');
            $table->integer('total_harga');
            $table->integer('harga_tambahan');
            $table->string('keterangan');
            $table->enum('active',['Y','N']);
            $table->foreign('pakaian_id')->references('id')->on('gaji')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_gaji');
    }
};
