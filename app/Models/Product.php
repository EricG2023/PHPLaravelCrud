<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model{

    use HasFactory;
    //this is a special property that let us "mass assignment" or 
    //assign more than one value at a time
    protected $fillable = ['name', 'price', 'description', 'item_number', 'image'];

    public static function search($search){
        return self::where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('item_number',  $search);
    }
}
?>