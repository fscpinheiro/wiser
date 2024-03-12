<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::inRandomOrder()->first();

        if ($category) {
            $products = Product::where('category_id', $category->id)->orderBy('price', 'desc')->get();
        } else {
            $products = collect([]);
        }

        return view('produtos', ['products' => $products]);
    }
}
