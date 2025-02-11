<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('pas_photo');
            $table->integer('no_daftar');
            $table->text('nama')->unique();
            $table->integer('nisn')->unique();
            $table->string('nik');
            $table->string('gender');
            $table->string('agama');
            $table->integer('no_kk')->unique();
            $table->string('tempat_l');
            $table->string('tanggal_l')->unique();
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
