<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembekalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembekals', function (Blueprint $table) {
            $table->id();
            $table->string('pembekal_nama');
            $table->string('pembekal_no_roc');
            $table->string('pembekal_bangunan');
            $table->string('pembekal_jalan');
            $table->string('pembekal_poskod');
            $table->string('pembekal_bandar');
            $table->string('pembekal_negeri');
            $table->string('pembekal_negeri_luar_malaysia');
            $table->string('pembekal_negara');
            $table->string('pembekal_no_tel');
            $table->string('pembekal_no_faks')->nullable();
            $table->string('pembekal_emel');
            $table->string('pembekal_status');
            
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
        Schema::dropIfExists('pembekals');
    }
}
