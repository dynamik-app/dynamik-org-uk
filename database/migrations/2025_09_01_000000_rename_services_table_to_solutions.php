<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('services') && ! Schema::hasTable('solutions')) {
            Schema::rename('services', 'solutions');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('solutions') && ! Schema::hasTable('services')) {
            Schema::rename('solutions', 'services');
        }
    }
};
