<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Order;
use App\Models\CartItem;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }    
    
    public function cartitem()
    {
        return $this->hasMany(CartItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
