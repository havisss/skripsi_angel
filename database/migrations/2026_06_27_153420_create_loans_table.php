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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('rule_id')->constrained('loan_rules');
            $table->decimal('principal_amount', 15, 2);
            $table->decimal('net_disbursement', 15, 2);
            $table->decimal('total_deduction', 15, 2);
            $table->enum('status', ['pending', 'approved', 'rejected', 'active', 'paid_off'])->default('pending');
            $table->string('document_ktp')->nullable();
            $table->string('document_stnk')->nullable();
            $table->string('document_bpkb')->nullable();
            $table->text('rejection_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
