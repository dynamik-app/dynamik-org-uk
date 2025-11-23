<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CertificateType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'metadata',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'metadata' => 'array',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(CertificateSection::class)->orderBy('sort_order');
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }
}
