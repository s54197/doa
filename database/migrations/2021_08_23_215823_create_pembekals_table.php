<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreatePembekalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembekals', function (Blueprint $table) {
            $table->id();
            $table->string('pembekal_nama');
            $table->string('pembekal_no_roc');
            $table->string('pembekal_bangunan');
            $table->string('pembekal_jalan');
            $table->string('pembekal_poskod');
            $table->string('pembekal_bandar');
            $table->string('pembekal_negeri');
            $table->string('pembekal_negeri_luar_malaysia');
            $table->string('pembekal_negara');
            $table->string('pembekal_no_tel');
            $table->string('pembekal_no_faks');
            $table->string('pembekal_emel');
            $table->string('pembekal_status');
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
        Schema::dropIfExists('pembekals');
    }
}
