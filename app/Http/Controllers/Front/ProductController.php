<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $main_cats = Category::where('is_parent', '1')->with('child')->get();
        return view('front.products.categories', compact('main_cats'));
    }

    public function category($id)
    {
        $category = Category::with('products')->find($id);
        return view('front.products.index', compact('category'));
    }

    public function product($id)
    {
        $product = Portfolio::find($id);
        $products = Portfolio::get();
        return view('front.products.details', compact('product','products'));
    }
}
