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
        Schema::create('perencanaan_audits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id');
            $table->string('jenis_audit');
            $table->string('jenis_program_audit');
            $table->string('tingkat_resiko');
            $table->foreignId('auditee_id');
            $table->string('periode');
            $table->string('status')->nullable();
            $table->date('firstdate');
            $table->date('enddate');
            $table->string('file')->nullable();
            $table->timestamps();
            $table->string('dasar_audit')->nullable(); 
            $table->string('anggaran')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perencanaan_audits');
    }
};
