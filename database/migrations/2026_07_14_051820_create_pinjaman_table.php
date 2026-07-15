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
    Schema::create('pinjaman', function (Blueprint $table) {
        $table->string('id_pinjaman')->primary();
        $table->string('id_member');
        $table->string('id_petugas');
        $table->date('tgl_ajuan');
        $table->string('status');
        $table->integer('tenor');
        $table->float('bunga');
        $table->double('nominal');
        $table->timestamps();

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
        Schema::dropIfExists('pinjamen');
    }
};
