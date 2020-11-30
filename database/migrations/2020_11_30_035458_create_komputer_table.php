<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomputerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komputer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_komp');
            $table->string('ip');
            $table->string('mac');
            $table->string('user');
            $table->string('email');
            $table->integer('id_ruangan');
            $table->integer('id_spesifikasi');
            $table->enum('status', ['aktif', 'perbaikan', 'peminjaman']);
            $table->string('keterangan');
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
        Schema::dropIfExists('komputer');
    }
}
