<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->string('syarikat_bandar');
            $table->string('syarikat_negeri');
            $table->string('syarikat_surat_bangunan');
            $table->string('syarikat_surat_jalan');
            $table->string('syarikat_surat_poskod');
            $table->string('syarikat_surat_bandar');
            $table->string('syarikat_surat_negeri');
            $table->string('syarikat_no_tel');
            $table->string('syarikat_no_faks');
            $table->string('syarikat_emel');
            $table->string('syarikat_wakil');
            $table->string('syarikat_status');
            $table->foreignIdFor(User::class);
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
