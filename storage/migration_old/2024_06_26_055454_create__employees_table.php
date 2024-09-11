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
        Schema::create('employee', function (Blueprint $table) {
            $table->char('e_id', 9)->primary();
            $table->string('e_name', 50);
            $table->string('e_address', 100);
            $table->string('e_PhoneNumber', 15);
            $table->string('e_email', 100);
            $table->timestamps();
        });

        Schema::table('employee', function (Blueprint $table) {
            $table->index('e_name', 'idx_e_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
