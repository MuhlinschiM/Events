<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Event extends Model
{
    protected $fillable = [
        'title_en', 'title_ro', 'title_ru',
        'slug_en', 'slug_ro', 'slug_ru',
        'category_id',
        'date_event', 'time_event',
        'location_en', 'location_ro', 'location_ru',
        'price',
        'image',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
