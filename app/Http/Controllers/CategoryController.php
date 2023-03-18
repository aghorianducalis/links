<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $categories */
        $categories = Category::query()->with(['parent', 'children'])->get();

        return $categories->toJson();
    }
}
