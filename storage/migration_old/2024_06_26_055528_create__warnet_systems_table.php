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
        Schema::create('warnet_system', function (Blueprint $table) {
            $table->char('ws_id', 9)->primary();
            $table->dateTime('ws_start_time');
            $table->dateTime('ws_end_time');
            $table->integer('ws_balance_used');
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
        Schema::dropIfExists('warnet_system');
    }
};
