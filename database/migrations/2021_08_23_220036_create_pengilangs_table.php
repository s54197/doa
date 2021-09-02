<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengilangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengilangs', function (Blueprint $table) {
            $table->id();
            $table->string('pengilang_nama');
            $table->string('pengilang_no_roc');
            $table->string('pengilang_bangunan');
            $table->string('pengilang_jalan');
            $table->string('pengilang_poskod');
            $table->string('pengilang_bandar');
            $table->string('pengilang_negeri');
            $table->string('pengilang_negeri_luar_malaysia');
            $table->string('pengilang_negara');
            $table->string('pengilang_no_tel');
            $table->string('pengilang_no_faks')->nullable();
            $table->string('pengilang_emel');
            $table->string('pengilang_status');

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
        Schema::dropIfExists('pengilangs');
    }
}
