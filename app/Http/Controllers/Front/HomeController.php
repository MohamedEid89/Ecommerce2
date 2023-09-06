<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // $products = Product::where('status', '=', 'active');
        $products = Product::with('category')->active()->latest()->limit(8)->get(); //scope, if we need limit we can not use paginate
        return view('front.home', compact('products'));
    }
}
