<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorangPengilangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borang_pengilangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengilang_pembekal_id');
            $table->unsignedBigInteger('pengilang_id');
            $table->foreign('pengilang_pembekal_id')->references('borangA_pengilang_pembekal')->on('borang_a_s')->onDelete('cascade');
            $table->foreign('pengilang_id')->references('id')->on('pengilangs')->onDelete('cascade');
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
        Schema::dropIfExists('borang_pengilangs');
    }
}
