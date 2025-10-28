<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['section_id', 'text', 'explanation'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
    
    // Add this method to your Question model
    public function answeredByUsers()
    {
        return $this->belongsToMany(User::class);
    }
}
