<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'path',
        'info',
        'category',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Member::class,'carts');
    }

}
