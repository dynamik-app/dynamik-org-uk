<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('supply_characteristics')->nullable();
            $table->string('main_switch')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index('certificate_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('boards');
    }
};
