<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorangPembekals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borang_pembekals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengilang_pembekal_id');
            $table->unsignedBigInteger('pembekal_id');
            $table->foreign('pengilang_pembekal_id')->references('borangA_pengilang_pembekal')->on('borang_a_s')->onDelete('cascade');
            $table->foreign('pembekal_id')->references('id')->on('pembekals')->onDelete('cascade');
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
        Schema::dropIfExists('borang_pembekals');
    }
}
