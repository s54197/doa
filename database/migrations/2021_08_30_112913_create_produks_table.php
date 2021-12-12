<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('produk_nama');
            $table->string('produk_lrmp_r');
            $table->string('produk_lrmp_no');
            $table->string('produk_no_fail');
            $table->date('produk_tarikh_gazet')->nullable();
            $table->date('produk_tarikh_tamat')->nullable();
            $table->date('produk_tarikh_penwartaan')->nullable();
            $table->string('produk_kelas_racun');
            $table->string('produk_categori');
            $table->string('produk_categori_lain')->nullable();
            $table->string('produk_kegunaan');
            $table->string('produk_kegunaan_lain')->nullable();
            $table->string('produk_status');
            $table->string('produk_saiz_isian_1');
            $table->string('produk_saiz_metrik_1');
            $table->string('produk_saiz_lain_1')->nullable();
            $table->string('produk_saiz_isian_2')->nullable();
            $table->string('produk_saiz_metrik_2')->nullable();
            $table->string('produk_saiz_lain_2')->nullable();
            $table->string('produk_saiz_isian_3')->nullable();
            $table->string('produk_saiz_metrik_3')->nullable();
            $table->string('produk_saiz_lain_3')->nullable();
            $table->string('produk_saiz_isian_4')->nullable();
            $table->string('produk_saiz_metrik_4')->nullable();
            $table->string('produk_saiz_lain_4')->nullable();
            $table->string('produk_saiz_isian_5')->nullable();
            $table->string('produk_saiz_metrik_5')->nullable();
            $table->string('produk_saiz_lain_5')->nullable();
            $table->string('produk_saiz_isian_6')->nullable();
            $table->string('produk_saiz_metrik_6')->nullable();
            $table->string('produk_saiz_lain_6')->nullable();

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
        Schema::dropIfExists('produks');
    }
}
