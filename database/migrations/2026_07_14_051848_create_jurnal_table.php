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
    Schema::create('jurnal', function (Blueprint $table) {
        $table->string('id_jurnal')->primary();
        $table->string('id_petugas');
        $table->date('tgl_transaksi');
        $table->text('deskripsi');
        $table->double('debit');
        $table->double('kredit');
        $table->timestamps();

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
        Schema::dropIfExists('jurnal');
    }
};
