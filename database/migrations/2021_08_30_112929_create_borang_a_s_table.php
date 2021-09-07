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
            $table->boolean('borangA_perniagaan_mengimport');
            $table->boolean('borangA_perniagaan_mengilang');
            $table->boolean('borangA_perniagaan_lain');
            $table->string('borangA_perniagaan_lain_maklumat');
            $table->boolean('borangA_mengilang_merumus');
            $table->boolean('borangA_mengilang_menyedia');
            $table->boolean('borangA_mengilang_mensebati');
            $table->boolean('borangA_mengilang_mencampur');
            $table->boolean('borangA_mengilang_melabel');
            $table->boolean('borangA_mengilang_mempek');
            $table->boolean('borangA_mengilang_membuat');
            $table->string('borangA_mengilang_lain');
            $table->string('borangA_mengilang_lain_maklumat');
            $table->unsignedBigInteger('borangA_pengilang_pembekal')->unique()->increments();
            $table->unsignedBigInteger('borangA_pengilang_kontrak')->unique()->increments();;
            $table->unsignedBigInteger('borangA_penginvoisan')->unique()->increments();;
            $table->unsignedBigInteger('borangA_gudang')->unique()->increments();;
            $table->unsignedBigInteger('borangA_perawis_aktif')->unique()->increments();;
            $table->string('borangA_perawis_kod');
            $table->string('borangA_perawis_perumusan');
            $table->string('borangA_perawis_perumusan_lain');
            $table->unsignedBigInteger('borangA_perawis_pengilang')->unique()->increments();;

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
