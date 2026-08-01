<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Hasfactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'customer_id',
        'name',
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
    
    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }    
    
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
