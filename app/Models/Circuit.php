<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Circuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'board_id',
        'reference',
        'description',
        'protective_device',
        'conductor_size',
        'max_zs',
        'measured_zs',
        'within_limits',
        'test_results',
        'metadata',
    ];

    protected $casts = [
        'max_zs' => 'decimal:3',
        'measured_zs' => 'decimal:3',
        'within_limits' => 'boolean',
        'test_results' => 'array',
        'metadata' => 'array',
    ];

    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }
}
