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
            
            $table->date('borangA_tarikh_terima_kaunter')->nullable();
            $table->date('borangA_tarikh_lulus')->nullable();
            $table->date('borangA_tarikh_tamat')->nullable();
            $table->string('borangA_wakil_syarikat');
            $table->string('borangA_jenis_pendaftaran');
            
            $table->string('borangA_no_pendaftaran');
            
            $table->boolean('borangA_perniagaan_mengimport');
            $table->boolean('borangA_perniagaan_mengilang');
            $table->boolean('borangA_perniagaan_lain')->nullable();
            $table->string('borangA_perniagaan_lain_maklumat')->nullable();
            $table->boolean('borangA_mengilang_merumus')->default(false);
            $table->boolean('borangA_mengilang_menyedia')->default(false);
            $table->boolean('borangA_mengilang_mensebati')->default(false);
            $table->boolean('borangA_mengilang_mencampur')->default(false);
            $table->boolean('borangA_mengilang_melabel')->default(false);
            $table->boolean('borangA_mengilang_mempek')->default(false);
            $table->boolean('borangA_mengilang_membuat')->default(false);
            $table->string('borangA_mengilang_lain')->nullable();
            $table->string('borangA_mengilang_lain_maklumat')->nullable();
            
            $table->string('borangA_perawis_perumusan');
            $table->string('borangA_perawis_perumusan_lain')->nullable();

            $table->string('borangA_sijil_no_siri')->nullable();
            $table->string('borangA_sijil_tarikh')->nullable();
            $table->string('borangA_sijil_fail_nama')->nullable();
            $table->string('borangA_sijil_fail_src')->nullable();
            $table->string('borangA_surat_no_rujukan_1')->nullable();
            $table->string('borangA_surat_no_rujukan_2')->nullable();
            $table->string('borangA_surat_tarikh')->nullable();
            $table->string('borangA_surat_resit_bayaran')->nullable();
            $table->string('borangA_surat_fail_nama')->nullable();
            $table->string('borangA_surat_fail_src')->nullable();
            
            $table->string('borangA_status');

            // Relation for user
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Relation for syarikat
            $table->unsignedBigInteger('syarikat_id');
            $table->foreign('syarikat_id')->references('id')->on('syarikats')->onDelete('cascade');

            // Relation for agen
            $table->unsignedBigInteger('agen_id');
            $table->foreign('agen_id')->references('id')->on('agens')->onDelete('cascade');

            // Relation for agen
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            
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
