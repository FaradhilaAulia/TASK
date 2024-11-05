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
        Schema::create('workflow_approvals', function (Blueprint $table) {
            $table->id();
            $table->string('modul'); // Nama modul
            $table->string('type'); // Jenis
            $table->decimal('value', 15, 2)->nullable(); // Nilai level
            $table->string('nik'); // Informasi approver
            $table->string('name');
            $table->string('email');
            $table->string('position');
            $table->timestamps();
        // Schema::create('workflow_approvals', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('modul');
        //     $table->string('type');
        //     $table->decimal('value', 15, 2)->nullable();
        //     $table->string('nik')->nullable(); // Bisa null untuk tipe HRIS
        //     $table->string('name')->nullable();
        //     $table->string('email')->nullable();
        //     $table->string('position')->nullable();
        //     $table->integer('level')->default(1); // Tambahan kolom level
        //     $table->boolean('is_active')->default(true); // Untuk menonaktifkan approval
        //     $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_approvals');
    }
};
