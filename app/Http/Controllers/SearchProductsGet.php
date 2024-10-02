<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Models\Product;

class SearchProductsGet extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {   
        try{
        $q = $request->query('q');
        if (!$q) {
            return response()->json(['message'=> 'Query parameter q is required'], Response::HTTP_BAD_REQUEST);
        }
        
                $products = Product::search($q)->get();

       return response()->json(['products' => $products], Response::HTTP_OK);
        } catch (\Exception $e){
            return response()->json(['message'=>'Error retrieving products. Please check you are using correct field names'], Response::HTTP_BAD_REQUEST);
        }
    }
}
