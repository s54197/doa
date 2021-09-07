<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorangPenginvoisanPenginvoisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borang_penginvoisan_penginvoisans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borang_penginvoisan_id');
            $table->unsignedBigInteger('penginvoisan_id');
            $table->foreign('borang_penginvoisan_id')->references('borangA_penginvoisan')->on('borang_a_s')->onDelete('cascade');
            $table->foreign('penginvoisan_id')->references('id')->on('penginvoisans')->onDelete('cascade');
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
        Schema::dropIfExists('borang_penginvoisan_penginvoisans');
    }
}
