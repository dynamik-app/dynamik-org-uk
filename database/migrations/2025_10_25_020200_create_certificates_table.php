<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_type_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('company_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('client_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('project_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->string('certificate_number')->nullable()->unique();
            $table->string('title')->nullable();
            $table->string('status')->default('draft');
            $table->date('issued_at')->nullable();
            $table->json('form_state')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['certificate_type_id', 'status']);
            $table->index('company_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
