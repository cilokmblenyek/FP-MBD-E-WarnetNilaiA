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
        Schema::create('computer', function (Blueprint $table) {
            $table->char('pc_id', 9)->primary();
            $table->string('pc_status', 256);
            $table->string('pc_specification', 256);
            $table->string('pc_RoomType', 256);
            $table->timestamps();
        });

        Schema::table('computer', function (Blueprint $table) {
            $table->index('pc_RoomType', 'idx_pc_room_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer');
    }
};
