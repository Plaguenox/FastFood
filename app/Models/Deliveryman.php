<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliveryman extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
