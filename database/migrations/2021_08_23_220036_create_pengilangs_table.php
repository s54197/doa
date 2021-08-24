<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->string('pengilang_no_faks');
            $table->string('pengilang_emel');
            $table->string('pengilang_status');
            $table->foreignIdFor(User::class);
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
