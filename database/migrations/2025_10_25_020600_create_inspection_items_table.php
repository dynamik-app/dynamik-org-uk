<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inspection_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspection_group_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('text');
            $table->string('regulation_ref')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();

            $table->index(['inspection_group_id', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inspection_items');
    }
};
