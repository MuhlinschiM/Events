<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function home()
{
    $categories = Category::with("events")->get();
    $events = $categories->pluck('events')->flatten();

    return view("home", [
        "categories" => $categories,
        "events" => $events,
    ]);
}


    public function about()
    {
        return view("about");
    }

    public function contacts()
    {
        return view("contacts");
    }
}
    