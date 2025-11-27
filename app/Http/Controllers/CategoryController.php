<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
{
    $category = Category::where("slug_en", $slug)->with("events")->firstOrFail();
    $categories = Category::all();

    return view("category.show", [
        "category" => $category,
        "categories" => $categories,
    ]);
}

}