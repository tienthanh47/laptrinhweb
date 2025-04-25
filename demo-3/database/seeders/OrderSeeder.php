<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    const MAX_ORDERS = 200;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xoá dữ liệu cũ
        DB::table('orders')->delete();

        $userIds = DB::table('users')->pluck('id'); // lấy tất cả user_id đã có

        // Chèn dữ liệu đơn hàng giả
        for ($i = 0; $i < self::MAX_ORDERS; $i++) {
            DB::table('orders')->insert([
                'user_id'      => $userIds->random(),
                'total_amount' => rand(100, 10000), // số tiền ngẫu nhiên
                'address'      => 'Số ' . rand(1, 100) . ' Nguyễn Văn Cừ, Hà Nội',
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
