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
        Schema::table('services', function (Blueprint $table) {
            // Add new columns after the 'description' column
            $table->string('slug')->unique()->after('description')->nullable();
            $table->longText('content')->after('description')->nullable();
            $table->boolean('is_published')->after('description')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // This allows the migration to be reversible
            $table->dropColumn(['slug', 'content', 'is_published']);
        });
    }
};
