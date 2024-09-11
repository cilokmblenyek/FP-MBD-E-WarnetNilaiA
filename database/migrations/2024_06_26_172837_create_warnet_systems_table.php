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
        Schema::create('warnetsystem', function (Blueprint $table) {
            $table->char('ws_id', 9)->primary();
            $table->dateTime('ws_StartTime');
            $table->dateTime('ws_EndTime');
            $table->integer('ws_BalanceUsed');
            $table->char('computer_pc_id', 9);
            $table->char('membership_m_id', 9);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warnetsystem');
    }
};
