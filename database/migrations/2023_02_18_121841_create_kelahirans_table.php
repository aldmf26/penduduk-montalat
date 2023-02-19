<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelahiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelahirans', function (Blueprint $table) {
            $table->id();
            $table->integer('penduduk_id');
            $table->string('nama');
            $table->string('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->time('jam');
            $table->enum('j_kelamin', ['pria', 'wanita']);
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
        Schema::dropIfExists('kelahirans');
    }
}
