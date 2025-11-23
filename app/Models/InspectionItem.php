<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InspectionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_group_id',
        'text',
        'regulation_ref',
        'order',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(InspectionGroup::class, 'inspection_group_id');
    }

    public function certificateInspections(): HasMany
    {
        return $this->hasMany(CertificateInspection::class);
    }
}
