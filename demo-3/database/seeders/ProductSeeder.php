<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    const MAX_PRODUCTS = 20;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xóa dữ liệu cũ (nếu có)
        DB::table('products')->delete();

        // Chèn dữ liệu mẫu
        for ($i = 1; $i <= self::MAX_PRODUCTS; $i++) {
            DB::table('products')->insert([
                'name'        => 'Product ' . $i,
                'image'       => 'product' . $i . '.jpg',
                'price'       => rand(50_000, 1_000_000),
                'quantity'    => rand(1, 100),
                'description' => 'Mô tả sản phẩm số ' . $i,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
