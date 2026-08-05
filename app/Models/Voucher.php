<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable =[
        'code',
        'discount_value',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }  
}
