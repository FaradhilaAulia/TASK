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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modul_id');
            $table->decimal('amount', 15, 2);
            $table->string('createdBy');
            $table->timestamps();

            // Menambahkan foreign key dengan nama kustom
            $table->foreign('modul_id', 'fk_transactions_modul_id')->references('id')->on('workflow_approvals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
