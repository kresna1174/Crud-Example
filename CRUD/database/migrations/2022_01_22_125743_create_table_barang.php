<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('barang', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('kode_barang');
        //     $table->string('nama_barang', 64);
        //     $table->integer('stok');
        //     $table->double('harga', 16,2);
        //     $table->text('deskripsi');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('barang');
    }
}
