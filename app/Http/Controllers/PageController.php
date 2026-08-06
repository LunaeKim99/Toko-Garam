<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function products()
    {
        return view('pages.products');
    }

    public function productDetail(string $slug)
    {
        return view('pages.product-detail', compact('slug'));
    }

    public function articles()
    {
        return view('pages.articles');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}