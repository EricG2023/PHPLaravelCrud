<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::search(request('search'))->paginate(10);
        return view("admin.products.index", ["products"=> $products]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        return view("admin.products.create", ["product"=> $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data
        //create a new product with valid data

        //if invalid, redirect back to the from with errors
       
        //if valid
        //create a product
        Product::create($this->validatedData($request));
        //retrun a view
        return redirect()->route("admin.products.index")->with("success","Product created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("admin.products.show", ["product"=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("admin.products.edit", ["product"=> $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //product lookup validatre update redirect

        $product->update($this->validatedData( $request ));
        return redirect()->route("admin.products.index")->with("success","Product updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function destroy(string  $id)
    {
       
        $product = Product::find($id);
        $product ->delete();

        return redirect()->route("admin.products.index")->with("success","Product deleted successfully!");
    }

    private function validatedData(Request $request){
        return $request->validate([
        "name"=> "required",
        "price"=> "required",
        "item_number"=> "integer",
        "description" => "required",
        "image" => "required",
]);
    }

}
