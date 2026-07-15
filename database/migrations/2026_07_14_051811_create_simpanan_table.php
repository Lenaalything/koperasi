<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('simpanan', function (Blueprint $table) {
        $table->string('id_simpanan')->primary();
        $table->string('id_member');
        $table->string('id_petugas');
        $table->string('jenis_simp');
        $table->double('nominal');
        $table->date('tgl_simpan');
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_member')->references('id_member')->on('member');
        $table->foreign('id_petugas')->references('id_petugas')->on('petugas');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simpanan');
    }
};
