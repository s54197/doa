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
            $table->date('agen_syarikat');
            $table->string('agen_roc');
            $table->string('agen_bangunan');
            $table->string('agen_jalan');
            $table->string('agen_poskod');
            $table->string('agen_bandar');
            $table->string('agen_negeri');
            $table->string('agen_no_tel');
            $table->string('agen_no_faks');
            $table->string('agen_emel');
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
