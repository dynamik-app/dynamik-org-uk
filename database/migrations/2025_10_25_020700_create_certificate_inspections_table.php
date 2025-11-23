<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificate_inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('inspection_item_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('result', ['N/A', 'LIM', 'Pass', 'C1', 'C2', 'C3'])->nullable();
            $table->timestamps();

            $table->unique(['certificate_id', 'inspection_item_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificate_inspections');
    }
};
