<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificate_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_type_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->json('schema')->nullable();
            $table->timestamps();

            $table->unique(['certificate_type_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificate_sections');
    }
};
