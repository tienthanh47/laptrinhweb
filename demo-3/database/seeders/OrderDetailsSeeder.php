<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailsSeeder extends Seeder
{
    const MAX_ITEMS_PER_ORDER = 5;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xóa dữ liệu cũ
        DB::table('order_detail')->delete();

        $orderIds   = DB::table('orders')->pluck('id');
        $productIds = DB::table('products')->pluck('id');

        foreach ($orderIds as $orderId) {
            $count = rand(1, self::MAX_ITEMS_PER_ORDER);
            $picked = $productIds->random($count);

            $total = 0;

            foreach ($picked as $productId) {
                // Lấy giá sản phẩm
                $product = DB::table('products')->where('id', $productId)->first();

                $quantity = rand(1, 5);
                $lineTotal = $product->price * $quantity;

                // Cộng dồn vào tổng tiền
                $total += $lineTotal;

                // Thêm chi tiết đơn hàng
                DB::table('order_detail')->insert([
                    'order_id'    => $orderId,
                    'product_id'  => $productId,
                    'quantity'    => $quantity,
                    'notes'       => 'Ghi chú cho sản phẩm #' . $productId,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }

            // Cập nhật total_amount vào bảng orders
            DB::table('orders')->where('id', $orderId)->update([
                'total_amount' => $total,
                'updated_at' => now(),
            ]);
        }
    }
}
