<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];

    // one category many subcategories
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    // one category many products

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
