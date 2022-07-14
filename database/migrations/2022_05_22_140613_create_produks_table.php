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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('gambar');
            $table->enum('ukuran', ["S","M","L","XL","XXL", "25","26", "27", "28", "29", "30", "31","32","33","37"]);
            $table->enum('gender', ["L","P"]);
            $table->integer('stok')->nullable();
            $table->integer('harga')->nullable();
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
        Schema::dropIfExists('produks');
    }
};
