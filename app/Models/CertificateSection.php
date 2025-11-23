<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertificateSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_type_id',
        'name',
        'slug',
        'description',
        'sort_order',
        'schema',
    ];

    protected $casts = [
        'schema' => 'array',
    ];

    public function certificateType(): BelongsTo
    {
        return $this->belongsTo(CertificateType::class);
    }
}
