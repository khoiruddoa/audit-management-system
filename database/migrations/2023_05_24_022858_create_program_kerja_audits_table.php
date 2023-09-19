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
        Schema::create('program_kerja_audits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perencanaan_audit_id');
            $table->foreignId('susunan_tim_id');
            $table->foreignId('pustaka_audit_id');
            $table->date('waktu');
            $table->text('tahapan');
            $table->string('status')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_kerja_audits');
    }
};
