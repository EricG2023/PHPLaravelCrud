<?php

namespace App\Models\Validators;
use Illuminate\Support\Facades\Validator;

class ProductValidator {
    public static function validate($data,$verb) {
        $idRule = 'integer';
        if ($verb === 'put') {
            $idRule = 'required|integer';
        }
        return Validator::make($data,[
            'id' => $idRule,
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'item_number' => 'required|integer',
            'image' => 'required|url'
        ])->validate();
    }
}