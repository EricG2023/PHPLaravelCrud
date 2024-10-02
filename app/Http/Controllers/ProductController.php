<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        $products = Product::search(request('search'))->paginate(10);
        return view("products.index", ["products"=> $products]);
    }

    public function show(Product $product)
    {
        return view("products.show", ["product"=> $product]);
    }
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Product::class)){
            return redirect()->route('product.index')->with('error', 'You do not have permission.');
        };
        $product = new Product;
        return view('product.create', ['product'=> $product]);
    }
}