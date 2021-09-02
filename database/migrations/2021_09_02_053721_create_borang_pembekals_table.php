<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorangPembekalsTable extends Migration
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
            $table->unsignedBigInteger('borang_id');
            $table->unsignedBigInteger('pembekal_id');
            $table->foreign('borang_id')->references('id')->on('borang_a_s')->onDelete('cascade');
            $table->foreign('pembekal_id')->references('id')->on('pembekals')->onDelete('cascade');
            $table->softDeletes(); 
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
