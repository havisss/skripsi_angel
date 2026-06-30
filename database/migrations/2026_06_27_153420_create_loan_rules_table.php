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
        Schema::create('loan_rules', function (Blueprint $table) {
            $table->id();
            $table->decimal('min_plafon', 15, 2);
            $table->decimal('max_plafon', 15, 2);
            $table->integer('tenor_months');
            $table->decimal('interest_rate_monthly', 5, 2);
            $table->decimal('admin_fee_percent', 5, 2);
            $table->decimal('insurance_fee_percent', 5, 2);
            $table->decimal('mandatory_savings_flat', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_rules');
    }
};
