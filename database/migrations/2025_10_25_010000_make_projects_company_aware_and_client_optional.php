<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
        });

        DB::statement('ALTER TABLE projects MODIFY client_id BIGINT UNSIGNED NULL');

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->nullOnDelete();
            $table->foreignId('company_id')->nullable()->after('client_id')->constrained()->cascadeOnDelete();
        });

        DB::statement('UPDATE projects p JOIN clients c ON p.client_id = c.id SET p.company_id = c.company_id WHERE p.client_id IS NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');

            $table->dropForeign(['client_id']);
        });

        DB::statement('ALTER TABLE projects MODIFY client_id BIGINT UNSIGNED NOT NULL');

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnDelete();
        });
    }
};
