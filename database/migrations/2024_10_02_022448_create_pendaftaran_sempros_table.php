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
        Schema::create('pendaftaran_sempros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id');
            $table->foreignId('pembimbing_id');
            $table->foreignId('advisor_id');
            $table->string('judul_proposal');
            $table->string('dokumen_kartu_bimbingan')->nullable();
            $table->string('dokumen_kehadiran_seminar_proposal')->nullable();
            $table->string('dokumen_turnitin')->nullable();
            $table->string('dokumen_pendaftaran_seminar_proposal')->nullable();
            $table->string('draf_proposal')->nullable();
            $table->string('tempat')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('waktu')->nullable();
            $table->string('selesai')->nullable();
            $table->string('link_spredsheet')->nullable();
            $table->string('komentar')->nullable();
            $table->integer('nilai')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_sempros');
    }
};
