<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class CategoryController extends Controller
{
    public function category(Request $request)
    {
        if ($request->isMethoD('POST')) {
        }

        return Inertia::render('Dashboard/Category/Create');
    }
    public function crear(Request $request)
    {
        // dd($request->all());
        if ($request->isMethoD('POST')) {

            Category::create([

                'title' => $request->title,
                'slug' => $request->slug,
            ]);
            return redirect()->route('category');
        }
    }
}
