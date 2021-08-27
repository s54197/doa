<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGudangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gudangs', function (Blueprint $table) {
            $table->id();
            $table->string('gudang_nama');
            $table->string('gudang_no_roc');
            $table->string('gudang_bangunan');
            $table->string('gudang_jalan');
            $table->string('gudang_poskod');
            $table->string('gudang_bandar');
            $table->string('gudang_negeri');
            $table->string('gudang_negeri_luar_malaysia');
            $table->string('gudang_negara');
            $table->string('gudang_no_tel');
            $table->string('gudang_no_faks');
            $table->string('gudang_emel');
            $table->string('gudang_status');

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
        Schema::dropIfExists('gudangs');
    }
}
