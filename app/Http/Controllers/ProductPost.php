<?php

namespace App\Http\Controllers;
use \App\Models\Validators\ProductValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Models\Product;


class ProductPost extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try{
        $data = $request->all();

        $validatedData = ProductValidator::validate($data, 'post');
        
        $product = Product::create($validatedData);

        return response()->json(['product' => $product], Response::HTTP_CREATED);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            return response()->json(['message'=> "Error creating product. Please Check you are sending correct data "]);
        }
}
}
