<?php

namespace App\Http\Controllers\API;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $req)
    {
        $query = $req->input("q");

        if (!$query) {
            return response()->json([
                "events" => [],
                "categories" => []
            ]);
        }

        $events = Event::where('title_en', 'LIKE', "%{$query}%")
            ->orWhere('title_ro', 'LIKE', "%{$query}%")
            ->orWhere('title_ru', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get(['id','title_en','image','slug_en']);

        $categories = Category::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ro', 'LIKE', "%{$query}%")
            ->orWhere('name_ru', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get(['id','name_en','slug_en']);

        return response()->json([
            "events" => $events,
            "categories" => $categories
        ]);
    }
}
