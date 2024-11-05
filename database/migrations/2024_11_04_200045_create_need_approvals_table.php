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
        Schema::create('need_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modul_id');
            $table->unsignedBigInteger('transaction_id');
            $table->string('nik');
            $table->string('name');
            $table->string('email');
            $table->string('position');
            $table->integer('level');
            $table->timestamps();

            // $table->foreign('modul_id')->references('id')->on('workflow_approvals')->onDelete('cascade');
            // $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('need_approvals');
    }
};
