<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use App\Models\CartItem;
use App\Models\OrderItem;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'name',
        'price',
        'stock',
        'material',
        'weight',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }    
    
    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }    
    
    public function cartitem()
    {
        return $this->hasMany(CartItem::class);
    }
}
