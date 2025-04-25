<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    const MAX_RECORDS = 100;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate table
        //DB::table('users')->truncate();

        DB::table('orders')->delete(); // Xoá dữ liệu bảng orders trước
        DB::table('users')->delete();  // Sau đó mới xoá bảng users


        // Insert admin user
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Insert additional users
        for ($i = 1; $i < self::MAX_RECORDS; $i++) {
            DB::table('users')->insert([
                [
                    'name' => 'user' . $i,
                    'email' => "admin{$i}@gmail.com",
                    'email_verified_at' => now(),
                    'password' => Hash::make('123456'),
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
