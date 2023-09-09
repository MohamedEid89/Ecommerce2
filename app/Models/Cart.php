<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'cookie_id', 'user_id', 'product_id', 'quantity', 'options'
    ];
    protected static function booted()
    {
        static::creating(function (Cart $cart) {
            $cart->id = Str::uuid();
        });
    }
    //Evets (Obervers)
    //Creating, Created
    //Updating ,Updated
    //Saving, Saved
    //Deleting, Deleted
    //Restoring, Restored
    //Retrieved
}
