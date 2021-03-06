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
            $table->string('pembekal_no_roc')->nullable();
            $table->string('pembekal_bangunan')->nullable();
            $table->string('pembekal_jalan')->nullable();
            $table->string('pembekal_poskod')->nullable();
            $table->string('pembekal_bandar')->nullable();
            $table->string('pembekal_negeri')->nullable();
            $table->string('pembekal_negeri_luar_malaysia')->nullable();
            $table->string('pembekal_negara');
            $table->string('pembekal_no_tel')->nullable();
            $table->string('pembekal_no_faks')->nullable();
            $table->string('pembekal_emel')->nullable();
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
