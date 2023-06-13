<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $table = "products";
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'sale_price',
        'brands',
        'rating',
        'image',
        'approve'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}