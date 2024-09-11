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
        Schema::create('cashier_transaction', function (Blueprint $table) {
            $table->char('t_id', 9)->primary();
            $table->date('t_date');
            $table->decimal('t_total_amount', 10, 2);
            $table->string('t_payment_method', 20);
            $table->char('membership_m_id', 9);
            $table->char('employee_e_id', 9);
            $table->timestamps();
        });

        Schema::table('cashier_transaction', function (Blueprint $table) {
            $table->index('t_payment_method', 'idx_t_payment_method');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashier_transaction');
    }
};
