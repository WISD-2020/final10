<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'member_id',
        'book_id',
        'name',
        'quantity',
        'money',
        'time',
        'status',
        'address',
        'way',
    ];
    

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
