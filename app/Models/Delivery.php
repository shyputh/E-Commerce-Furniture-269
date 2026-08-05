<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable =[
        'order_id',
        'tracking_no',
        'courier',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
