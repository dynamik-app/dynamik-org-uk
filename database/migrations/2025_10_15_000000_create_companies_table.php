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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users')->cascadeOnDelete();
            $table->string('registered_name');
            $table->string('companies_house_number')->nullable();
            $table->string('registered_status')->nullable();
            $table->date('incorporation_date')->nullable();
            $table->text('registered_address')->nullable();
            $table->string('paye_reference')->nullable();
            $table->string('corporation_tax_utr')->nullable();
            $table->string('vat_number')->nullable();
            $table->json('companies_house_snapshot')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
