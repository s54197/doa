<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyarikatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syarikats', function (Blueprint $table) {
            $table->id();          
            $table->string('syarikat_nama');
            $table->string('syarikat_no_roc');
            $table->date('syarikat_tarikh_roc');
            $table->string('syarikat_bangunan');
            $table->string('syarikat_jalan');
            $table->string('syarikat_poskod');
            $table->string('syarikat_bandar')->nullable();
            $table->string('syarikat_negeri')->nullable();
            $table->string('syarikat_negeri_luar_malaysia')->nullable();
            $table->string('syarikat_negara');
            $table->string('syarikat_surat_bangunan');
            $table->string('syarikat_surat_jalan');
            $table->string('syarikat_surat_poskod');
            $table->string('syarikat_surat_bandar')->nullable();
            $table->string('syarikat_surat_negeri')->nullable();
            $table->string('syarikat_surat_negeri_luar_malaysia')->nullable();
            $table->string('syarikat_surat_negara');
            $table->string('syarikat_no_tel');
            $table->string('syarikat_no_faks')->nullable();
            $table->string('syarikat_emel');
            $table->string('syarikat_wakil')->nullable();
            $table->string('syarikat_status');

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
        Schema::dropIfExists('syarikats');
    }
}
