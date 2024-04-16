<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // $products = Product::simplePaginate(1);

        return view('products', compact('products'));
        // return view('products.index', $products);
        // return view('products.index', ['products' => $products]);
    }
}
