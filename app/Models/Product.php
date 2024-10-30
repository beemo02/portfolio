<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Store;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','productDescription','sub_category_id', 'store_id', 'image'];
    
    public function subcategories()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    
}
