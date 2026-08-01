<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Hasfactory;
use App\Models\Order;

class Payment extends Model
{
    use HasFactory;

    protected $fillable =[
        'order_id',
        'method',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
