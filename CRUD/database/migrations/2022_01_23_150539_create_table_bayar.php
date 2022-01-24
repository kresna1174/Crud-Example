<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBayar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('bayar', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('id_barang');
        //     $table->double('total_biaya', 16,2);
        //     $table->double('total_bayar', 16,2);
        //     $table->timestamp('expired_at');
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
        // Schema::dropIfExists('bayar');
    }
}
