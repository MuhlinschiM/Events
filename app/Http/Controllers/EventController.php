<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;

class EventController extends Controller
{
     public function show($slug)
    {
        $event = Event::where("slug_en", $slug)->firstOrFail();

        return view("events.show", ["event" => $event]);
    }
}
