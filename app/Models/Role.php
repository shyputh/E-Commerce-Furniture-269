<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Hasfactory;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }  
}
