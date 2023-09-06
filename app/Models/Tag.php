<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false; // timestamps not registerd in migration
    protected $fillable = [
        'name', 'slug'
    ];
    public function products()
    {
        return $this->belongsToMany(
            Product::class //related Model 
            //'product_tag', pivot table name
            //'product_id', forenkey fro product
            //'tag_id',  foregin key for tag
            // 'id',   Pk current model
            //'id',  PK related model
        );
    }
}
