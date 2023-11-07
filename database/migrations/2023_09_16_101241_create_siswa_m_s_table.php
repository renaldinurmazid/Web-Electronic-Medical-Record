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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nisn',10)->unique();
            $table->string('nama_lengkap',255);
            $table->bigInteger('kelas_id');
            $table->string('sakit',255);
            $table->date('tanggal');
            $table->bigInteger('obat_id');
            $table->string('alamat',255);
            $table->string('status')->default('default_value_here');
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
        Schema::dropIfExists('siswa');
    }
};
