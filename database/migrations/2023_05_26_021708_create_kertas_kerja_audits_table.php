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
        Schema::create('kertas_kerja_audits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_kerja_audit_id');
            $table->string('temuan');
            $table->date('tanggal');
            $table->text('data_umum');
            $table->text('kondisi');
            $table->text('kriteria');
            $table->text('sebab');
            $table->text('rekomendasi');
            $table->date('batas_waktu')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kertas_kerja_audits');
    }
};
