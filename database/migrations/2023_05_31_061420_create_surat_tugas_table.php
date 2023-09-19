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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perencanaan_audit_id');
            $table->string('nomor_surat');
            $table->string('tanggal_surat');
            $table->string('tujuan');
            $table->string('tempat');
            $table->text('keterangan');
            $table->string('penanda_tangan');
            $table->string('jabatan');
            $table->text('tembusan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_tugas');
    }
};
