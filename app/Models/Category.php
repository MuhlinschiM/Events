<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        "name_en",
        "name_ru",
        "name_ro",
        "slug_en",
        "slug_ru",
        "slug_ro",
        "category_id"
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    // Опционально: связь для вложенных категорий
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'category_id');
    }
}
