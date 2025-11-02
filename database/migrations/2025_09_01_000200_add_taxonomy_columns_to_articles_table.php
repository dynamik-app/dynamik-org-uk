<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->nullable()
                ->after('user_id')
                ->constrained('knowledge_base_categories')
                ->nullOnDelete();
            $table->foreignId('topic_id')
                ->nullable()
                ->after('category_id')
                ->constrained('knowledge_base_topics')
                ->nullOnDelete();
            $table->string('summary')->nullable()->after('slug');
            $table->timestamp('published_at')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropConstrainedForeignId('topic_id');
            $table->dropConstrainedForeignId('category_id');
            $table->dropColumn(['summary', 'published_at']);
        });
    }
};
