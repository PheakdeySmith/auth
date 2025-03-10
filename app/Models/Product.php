<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'product_name',
        'price',
        'category_name',
        'stock_quantity',
        'description',
        'image',
        'discount_price',
        'status',
        'slug',
        'weight',
        'dimensions',
        'on_sale',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
