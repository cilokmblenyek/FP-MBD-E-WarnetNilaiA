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
        Schema::table('CashierTransaction_AddBalance', function (Blueprint $table) {
            $table->foreign('CashierTransaction_t_id')
                ->references('t_id')
                ->on('CashierTransaction')
                ->onDelete('cascade');

            $table->foreign('AddBalance_ab_id')
                ->references('ab_id')
                ->on('AddBalance')
                ->onDelete('cascade');
        });

        Schema::table('CashierTransaction_fnb', function (Blueprint $table) {
            $table->foreign('CashierTransaction_t_id')
                ->references('t_id')
                ->on('CashierTransaction')
                ->onDelete('cascade');

            $table->foreign('fnb_fb_id')
                ->references('fb_id')
                ->on('fnb')
                ->onDelete('cascade');
        });

        Schema::table('CashierTransaction', function (Blueprint $table) {
            $table->foreign('membership_m_id')
                ->references('m_id')
                ->on('membership')
                ->onDelete('cascade');

                $table->foreign('employee_e_id')
                ->references('e_id')
                ->on('employee')
                ->onDelete('cascade');
        });

        Schema::table('warnetsystem', function (Blueprint $table) {
            $table->foreign('computer_pc_id')
                ->references('pc_id')
                ->on('computer')
                ->onDelete('cascade');

            $table->foreign('membership_m_id')
                ->references('m_id')
                ->on('membership')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('CashierTransaction_AddBalance', function (Blueprint $table) {
            $table->dropForeign(['CashierTransaction_t_id']);
            $table->dropForeign(['AddBalance_ab_id']);
        });

        Schema::table('CashierTransaction_fnb', function (Blueprint $table) {
            $table->dropForeign(['CashierTransaction_t_id']);
            $table->dropForeign(['fnb_fb_id']);
        });

        Schema::table('CashierTransaction', function (Blueprint $table) {
            $table->dropForeign(['membership_m_id']);
            $table->dropForeign(['employee_e_id']);
        });

        Schema::table('warnetsystem', function (Blueprint $table) {
            $table->dropForeign(['computer_pc_id']);
            $table->dropForeign(['membership_m_id']);
        });
    }
};
