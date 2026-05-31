<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $categories = Category::all();

        $services = Service::where('active', true)
            ->with('category')
            ->get();

        return view('site.home', compact(
            'categories',
            'services'
        ));
    }
}
