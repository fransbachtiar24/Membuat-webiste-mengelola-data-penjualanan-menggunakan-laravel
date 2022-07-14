<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->Date('tanggal');
            $table->String('nama_pelanggan');
            $table->String('jenis_produk');
            $table->String('brand');
            $table->String('ukuran');
            $table->String('gender');
            $table->integer('jumlah_pesan');
            $table->integer('harga');
            $table->integer('total_harga');
            $table->foreignId('produk_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
};
