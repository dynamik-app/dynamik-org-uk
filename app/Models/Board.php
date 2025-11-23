<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_id',
        'name',
        'location',
        'supply_characteristics',
        'main_switch',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }

    public function circuits(): HasMany
    {
        return $this->hasMany(Circuit::class);
    }
}
