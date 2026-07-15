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
    Schema::create('aset', function (Blueprint $table) {
        $table->string('id_aset')->primary();
        $table->string('id_petugas');
        $table->string('nama_aset');
        $table->string('kategori');
        $table->double('nilai_perolehan');
        $table->date('tgl_perolehan');
        $table->string('kondisi');
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
        Schema::dropIfExists('aset');
    }
};
