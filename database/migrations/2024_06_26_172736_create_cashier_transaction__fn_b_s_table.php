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
        Schema::create('CashierTransaction_fnb', function (Blueprint $table) {
            $table->char('CashierTransaction_t_id', 9);
            $table->char('fnb_fb_id', 9);
            $table->integer('amount');
            $table->timestamps();
            $table->primary(['CashierTransaction_t_id', 'fnb_fb_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CashierTransaction_fnb');
    }
};
