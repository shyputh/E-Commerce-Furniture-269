<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;
use App\Models\Customer;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'qty',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }    
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
