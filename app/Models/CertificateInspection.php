<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertificateInspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_id',
        'inspection_item_id',
        'result',
    ];

    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }

    public function inspectionItem(): BelongsTo
    {
        return $this->belongsTo(InspectionItem::class);
    }
}
