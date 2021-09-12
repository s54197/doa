<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorangPihakKetigasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borang_pihak_ketigas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borang_a_s_id');
            $table->unsignedBigInteger('pihak_ketiga_id');
            $table->foreign('borang_a_s_id')->references('id')->on('borang_a_s')->onDelete('cascade');
            $table->foreign('pihak_ketiga_id')->references('id')->on('pihak_ketigas')->onDelete('cascade');
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
        Schema::dropIfExists('borang_pihak_ketigas');
    }
}
