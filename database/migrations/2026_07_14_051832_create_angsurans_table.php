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
    Schema::create('angsurans', function (Blueprint $table) {
        $table->string('id_angsuran')->primary();
        $table->string('id_member');
        $table->string('id_petugas');
        $table->integer('ke_angsuran');
        $table->double('nominal');
        $table->date('tgl_bayar');
        $table->date('tgl_jatuh_tmp');
        $table->string('status_bayar');
        $table->timestamps();

        $table->foreign('id_member')->references('id_member')->on('members');
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
        Schema::dropIfExists('angsurans');
    }
};
