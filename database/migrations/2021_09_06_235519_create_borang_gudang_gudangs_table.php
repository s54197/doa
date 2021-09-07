<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorangGudangGudangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borang_gudang_gudangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borang_gudang_id');
            $table->unsignedBigInteger('gudang_id');
            $table->foreign('borang_gudang_id')->references('borangA_gudang')->on('borang_a_s')->onDelete('cascade');
            $table->foreign('gudang_id')->references('id')->on('gudangs')->onDelete('cascade');
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
        Schema::dropIfExists('borang_gudang_gudangs');
    }
}
