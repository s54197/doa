<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenginvoisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penginvoisans', function (Blueprint $table) {
            $table->id();
            $table->string('penginvoisan_nama');
            $table->string('penginvoisan_no_roc');
            $table->string('penginvoisan_bangunan');
            $table->string('penginvoisan_jalan');
            $table->string('penginvoisan_poskod');
            $table->string('penginvoisan_bandar');
            $table->string('penginvoisan_negeri');
            $table->string('penginvoisan_negeri_luar_malaysia');
            $table->string('penginvoisan_negara');
            $table->string('penginvoisan_no_tel');
            $table->string('penginvoisan_no_faks')->nullable();
            $table->string('penginvoisan_emel');
            $table->string('penginvoisan_status');

            // one to many relation for user
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('penginvoisans');
    }
}
