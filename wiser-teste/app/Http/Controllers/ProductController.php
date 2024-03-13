<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::inRandomOrder()->first();

        if ($category) {
            Session::put('category_id', $category->id);
            $products = Product::where('category_id', $category->id)->orderBy('price', 'desc')->get();
        } else {
            $products = collect([]);
        }

        return view('produtos', ['products' => $products]);
    }

    public function filterByPrice(Request $request)
    {
        $price = $request->get('price');
        $categoryId = Session::get('category_id');
        if ($categoryId) {
            $query = Product::where('category_id', $categoryId);
        } else {
            $query = Product::query();
        }
        if ($price) {
            $query->priceGreaterThan($price);
        }
        $products = $query->get();
        return view('produtos', ['products' => $products]);
    }
}
