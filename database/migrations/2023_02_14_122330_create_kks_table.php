<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kks', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk');
            $table->string('no_ktp');
            $table->string('nm_kepala_keluarga');
            $table->string('no_hp');
            $table->string('alamat');
            $table->integer('jml_keluarga');
            $table->date('tgl_terbit');
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
        Schema::dropIfExists('kks');
    }
}
