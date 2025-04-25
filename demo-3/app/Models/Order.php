<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders'; // nếu bạn đặt tên bảng là `orders`

    protected $fillable = [
        'user_id',
        'total_amount',
        'address',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
