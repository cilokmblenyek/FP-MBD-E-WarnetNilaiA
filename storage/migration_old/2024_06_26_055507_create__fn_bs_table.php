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
        Schema::create('fnb', function (Blueprint $table) {
            $table->char('fb_id', 9)->primary();
            $table->string('fb_name', 50);
            $table->decimal('fb_price', 10, 2);
            $table->integer('fb_stock');
            $table->timestamps();
        });

        Schema::table('fnb', function (Blueprint $table) {
            $table->index('fb_stock', 'idx_fb_stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fnb');
    }
};
