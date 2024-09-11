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
        Schema::create('CashierTransaction_AddBalance', function (Blueprint $table) {
            $table->char('CashierTransaction_t_id', 9);
            $table->char('AddBalance_ab_id', 9);
            $table->timestamps();
            $table->primary(['CashierTransaction_t_id', 'AddBalance_ab_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashier_transaction_AddBalance');
    }
};
