<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'hero';

    protected $fillable = [
        'name_en', 'name_ro', 'name_ru',
        'slug_en', 'slug_ro', 'slug_ru',
        'price'
    ];
}
