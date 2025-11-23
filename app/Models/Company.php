<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'registered_name',
        'companies_house_number',
        'registered_status',
        'incorporation_date',
        'registered_address',
        'paye_reference',
        'corporation_tax_utr',
        'vat_number',
        'companies_house_snapshot',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'companies_house_snapshot' => 'array',
            'incorporation_date' => 'date',
        ];
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function managers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'company_user')
            ->withPivot('role', 'assigned_by')
            ->withTimestamps();
    }

    public function managingTeams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'company_team')
            ->withPivot('role', 'assigned_by')
            ->withTimestamps();
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(CompanyInvitation::class);
    }
}
