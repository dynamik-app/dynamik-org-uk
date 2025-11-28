<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->decimal('tax_total', 12, 2)->default(0)->after('subtotal');
        });

        Schema::table('invoice_items', function (Blueprint $table) {
            $table->decimal('tax_rate', 5, 2)->default(0)->after('quantity');
            $table->decimal('line_tax', 12, 2)->default(0)->after('unit_price');
        });
    }

    public function down(): void
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropColumn(['tax_rate', 'line_tax']);
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('tax_total');
        });
    }
};
