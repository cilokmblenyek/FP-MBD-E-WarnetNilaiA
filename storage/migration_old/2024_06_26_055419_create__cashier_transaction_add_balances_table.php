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
        Schema::create('cashier_transaction_add_balance', function (Blueprint $table) {
            $table->char('cashier_transaction_t_id', 9);
            $table->char('add_balance_ab_id', 9);
            $table->timestamps();
            $table->primary(['cashier_transaction_t_id', 'add_balance_ab_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashier_transaction_add_balance');
    }
};
