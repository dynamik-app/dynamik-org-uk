<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstimateItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'estimate_id',
        'catalog_item_id',
        'item_type',
        'name',
        'description',
        'quantity',
        'tax_rate',
        'unit_price',
        'line_tax',
        'line_total',
    ];

    protected $casts = [
        'quantity' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'unit_price' => 'decimal:2',
        'line_tax' => 'decimal:2',
        'line_total' => 'decimal:2',
    ];

    public function estimate(): BelongsTo
    {
        return $this->belongsTo(Estimate::class);
    }

    public function catalogItem(): BelongsTo
    {
        return $this->belongsTo(CatalogItem::class);
    }
}
