<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_type_id',
        'company_id',
        'client_id',
        'project_id',
        'certificate_number',
        'title',
        'status',
        'issued_at',
        'form_state',
        'metadata',
    ];

    protected $casts = [
        'issued_at' => 'date',
        'form_state' => 'array',
        'metadata' => 'array',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(CertificateType::class, 'certificate_type_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function boards(): HasMany
    {
        return $this->hasMany(Board::class);
    }

    public function inspections(): HasMany
    {
        return $this->hasMany(CertificateInspection::class);
    }

    public function observations(): HasMany
    {
        return $this->hasMany(Observation::class);
    }
}
