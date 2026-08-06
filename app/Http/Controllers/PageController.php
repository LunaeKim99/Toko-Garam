<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Product;

class PageController extends Controller
{
    public function home()
    {
        $company = CompanyProfile::first();
        $product = Product::first();

        return view('pages.home', compact('company', 'product'));
    }

    public function about()
    {
        $company = CompanyProfile::first();
        $galleries = Gallery::all();

        return view('pages.about', compact('company', 'galleries'));
    }

    public function product()
    {
        $product = Product::first();

        return view('pages.product', compact('product'));
    }

    public function gallery()
    {
        $galleries = Gallery::all();
        $categories = Gallery::distinct()->pluck('kategori')->toArray();

        return view('pages.gallery', compact('galleries', 'categories'));
    }

    public function contact()
    {
        $company = CompanyProfile::first();
        $product = Product::first();

        return view('pages.contact', compact('company', 'product'));
    }
}
