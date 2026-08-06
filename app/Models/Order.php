<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Customer;
use App\Models\Voucher;
use App\Models\Payment;
use App\Models\OrderItem; 
use App\Models\Delivery;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'customer_id',
        'total',
        'status',
        'voucher_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }    
    
    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }    
    
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }    
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }    
    
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
