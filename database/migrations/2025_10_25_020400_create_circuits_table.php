<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('circuits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('board_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('reference')->nullable();
            $table->string('description')->nullable();
            $table->string('protective_device')->nullable();
            $table->string('conductor_size')->nullable();
            $table->decimal('max_zs', 8, 3)->nullable();
            $table->decimal('measured_zs', 8, 3)->nullable();
            $table->boolean('within_limits')->default(true);
            $table->json('test_results')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index('board_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('circuits');
    }
};
