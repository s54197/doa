<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePihakKetigasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pihak_ketigas', function (Blueprint $table) {
            $table->id();
            $table->string('pihak_ketiga_nama');
            $table->string('pihak_ketiga_no_roc');
            $table->string('pihak_ketiga_bangunan')->nullable();
            $table->string('pihak_ketiga_jalan')->nullable();
            $table->string('pihak_ketiga_poskod')->nullable();
            $table->string('pihak_ketiga_bandar')->nullable();
            $table->string('pihak_ketiga_negeri')->nullable();
            $table->string('pihak_ketiga_negeri_luar_malaysia')->nullable();
            $table->string('pihak_ketiga_negara');
            $table->string('pihak_ketiga_no_tel');
            $table->string('pihak_ketiga_no_faks')->nullable();
            $table->string('pihak_ketiga_emel');
            $table->string('pihak_ketiga_status');
            $table->string('pihak_ketiga_jenis');

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
        Schema::dropIfExists('pihak_ketigas');
    }
}
