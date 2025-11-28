<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Event;
use App\Models\Hero;

class SiteSeeder extends Seeder
{
    public function run(): void
    {
        $concerts = Category::create([
            'name_en' => 'Concerts',
            'name_ro' => 'Concerte',
            'name_ru' => 'Концерты',
            'slug_en' => 'concerts',
            'slug_ro' => 'concerte',
            'slug_ru' => 'концерты'
        ]);

        Event::create([
            'title_en' => 'Rock Concert by The Rockers',
            'title_ro' => 'Concert Rock de The Rockers',
            'title_ru' => 'Рок-концерт группы The Rockers',
            'slug_en' => 'rock-concert-by-the-rockers',
            'slug_ro' => 'concert-rock-de-the-rockers',
            'slug_ru' => 'rok-koncert-gruppy-the-rockers',
            'category_id' => $concerts->id,
            'date_event' => '2025-09-15',
            'time_event' => '19:00:00',
            'location_en' => 'Chisinau Arena',
            'location_ro' => 'Arena Chisinau',
            'location_ru' => 'Арена Кишинэу',
            'image' => 'images/events/rock.jpg',
            'price' => 750.00,
            'description' => 'Powerful rock concert'
        ]);

        Hero::create([
            'name_en' => 'Hero Banner 1',
            'name_ro' => 'Banner Erou 1',
            'name_ru' => 'Герой Баннер 1',
            'slug_en' => 'hero-1',
            'slug_ro' => 'erou-1',
            'slug_ru' => 'герой-1',
            'price' => 500
        ]);
    }
}
