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
        Schema::create('membership', function (Blueprint $table) {
            $table->char('m_id', 9)->primary();
            $table->string('m_username', 20);
            $table->string('m_password', 100);
            $table->string('m_PhoneNumber', 15);
            $table->string('m_email', 100)->nullable();
            $table->string('m_address', 100);
            $table->integer('m_balance');
            $table->date('m_StartDate');
            $table->date('m_EndDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership');
    }
};
