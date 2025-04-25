<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'quantity',
        'description',
    ];

    /**
     * Mối quan hệ: Một sản phẩm có nhiều chi tiết đơn hàng
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
