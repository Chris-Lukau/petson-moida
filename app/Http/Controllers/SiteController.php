<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;

class SiteController extends Controller
{
    public function home()
    {
        $categories = Category::orderBy('name')->get();

        $services = Service::with('category:id,name')
            ->where('active', true)
            ->select(
                'id',
                'category_id',
                'name',
                'photo_path',
                'base_price',
                'pricing_type'
            )
            ->get();

        return view('site.home', [
            'categories' => $categories,
            'services' => $services,
        ]);
    }
}
