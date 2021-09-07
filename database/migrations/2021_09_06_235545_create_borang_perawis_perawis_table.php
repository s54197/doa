<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorangPerawisPerawisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borang_perawis_perawis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borang_perawis_id');
            $table->unsignedBigInteger('perawis_id');
            $table->foreign('borang_perawis_id')->references('borangA_perawis_aktif')->on('borang_a_s')->onDelete('cascade');
            $table->foreign('perawis_id')->references('id')->on('perawis')->onDelete('cascade');
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
        Schema::dropIfExists('borang_perawis_perawis');
    }
}
