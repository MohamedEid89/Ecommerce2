<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'description', 'image', 'category_id', 'store_id', 'price', 'compare_price', 'status',
    ];
    protected static function booted()
    {
        static::addGlobalScope('store', function (Builder $builder) {
            $user = Auth::user();
            if ($user && $user->store_id) {
                $builder->where('store_id', '=', $user->store_id);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,  //related Model 
            //'product_tag', pivot table name
            //'product_id', forenkey fro product
            //'tag_id',  foregin key for tag
            // 'id',   Pk current model
            //'id',  PK related model

        );
    }
    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }

    //Accessors 
    public function getImageUrlAttribute()
    {

        if (!$this->image) {
            return 'https://cdn.jumbula.com/website/before.png';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }

    public function getSalePercentAttribute()
    {
        if (!$this->compare_price) {
            return 0;
        }
        return number_format(100 - (100 * $this->price / $this->compare_price));
    }
}
