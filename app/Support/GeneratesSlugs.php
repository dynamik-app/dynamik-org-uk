<?php

namespace App\Support;

use Illuminate\Support\Str;

trait GeneratesSlugs
{
    protected function generateUniqueSlug(string $modelClass, string $value, ?int $ignoreId = null, string $column = 'slug'): string
    {
        $baseSlug = Str::slug($value);
        $slug = $baseSlug;
        $counter = 2;

        while ($modelClass::where($column, $slug)
            ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
