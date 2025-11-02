<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeBaseCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function topics()
    {
        return $this->hasMany(KnowledgeBaseTopic::class, 'category_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
