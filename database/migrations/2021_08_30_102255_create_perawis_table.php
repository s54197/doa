<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerawisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perawis', function (Blueprint $table) {
            $table->id();
            $table->string('perawis_nama');
            $table->string('perawis_nama_kimia')->nullable();
            $table->string('perawis_sinonim')->nullable();
            $table->string('perawis_cas');
            $table->string('perawis_hscode');
            $table->string('perawis_ahtncode');
            $table->boolean('perawis_piawaian');
            $table->boolean('perawis_sampel');
            $table->boolean('perawis_pihak_ketiga');
            $table->string('perawis_kumpulan_kimia');
            $table->string('perawis_kaedah');
            $table->date('perawis_tarikh_lulus');
            $table->date('perawis_tarikh_terhad');
            $table->date('perawis_tarikh_haram');
            $table->string('perawis_peratusan');
            $table->string('perawis_unit');
            $table->string('perawis_unit_lain')->nullable();
            $table->string('perawis_status');

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
        Schema::dropIfExists('perawis');
    }
}
