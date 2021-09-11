<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgensTable extends Migration
{
      
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agens', function (Blueprint $table) {
            $table->id();
            $table->string('agen_nama');
            $table->string('agen_ic');
            $table->string('agen_syarikat');
            $table->string('agen_roc');
            $table->string('agen_bangunan');
            $table->string('agen_jalan');
            $table->string('agen_poskod');
            $table->string('agen_bandar')->nullable();
            $table->string('agen_negeri')->nullable(); 
            $table->string('agen_negeri_luar_malaysia')->nullable();
            $table->string('agen_negara');
            $table->string('agen_no_tel');
            $table->string('agen_no_faks')->nullable();
            $table->string('agen_emel');
            $table->string('agen_status');
             
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
        Schema::dropIfExists('agens');
    }
}
