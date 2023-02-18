<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('no_ktp');
            $table->string('nama');
            $table->enum('j_kelamin',['pria','wanita']);
            $table->string('agama');
            $table->string('gol_darah');
            $table->string('nm_ayah');
            $table->string('nm_ibu');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('status_nikah');
            $table->string('warga_negara');
            $table->string('status_hidup');
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
        Schema::dropIfExists('penduduks');
    }
}
