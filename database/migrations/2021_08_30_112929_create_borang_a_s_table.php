<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorangASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borang_a_s', function (Blueprint $table) {
            $table->id();

            $table->string('borangA_syarikat');
            $table->string('borangA_agen');
            $table->date('borangA_tarikh_terima_kaunter');
            $table->date('borangA_tarikh_lulus');
            $table->date('borangA_tarikh_tamat');
            $table->string('borangA_wakil_syarikat');
            $table->string('borangA_jenis_pendaftaran');
            $table->string('borangA_dagangan');
            $table->string('borangA_no_pendaftaran');
            $table->string('borangA_perniagaan_mengimport');
            $table->string('borangA_perniagaan_mengilang');
            $table->string('borangA_perniagaan_lain');
            $table->string('borangA_perniagaan_lain_maklumat');
            $table->string('borangA_mengilang_merumus');
            $table->string('borangA_mengilang_menyedia');
            $table->string('borangA_mengilang_mensebati');
            $table->string('borangA_mengilang_mencampur');
            $table->string('borangA_mengilang_melabel');
            $table->string('borangA_mengilang_mempek');
            $table->string('borangA_mengilang_membuat');
            $table->string('borangA_mengilang_lain');
            $table->string('borangA_mengilang_lain_maklumat');
            $table->string('borangA_perniagaan_bangunan');
            $table->string('borangA_perniagaan_jalan');
            $table->string('borangA_perniagaan_poskod');
            $table->string('borangA_perniagaan_bandar');
            $table->string('borangA_perniagaan_negeri');
            $table->string('borangA_pengilang');
            $table->string('borangA_pengilang_kontrak');
            $table->string('borangA_penginvoisan');
            $table->string('borangA_gudang');
            $table->string('borangA_perawis_aktif');
            $table->string('borangA_perawis_kod');
            $table->string('borangA_perawis_perumusan');
            $table->string('borangA_perawis_perumusan_lain');
            $table->string('borangA_perawis_pengilang');

            $table->string('borangA_status');

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
        Schema::dropIfExists('borang_a_s');
    }
}
