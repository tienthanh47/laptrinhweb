<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();                                // id (Primary Key)
            $table->string('name');                      // tên sản phẩm
            $table->string('image')->nullable();         // đường dẫn ảnh
            $table->decimal('price', 12, 2);             // giá
            $table->integer('quantity')->default(0);     // tồn kho
            $table->text('description')->nullable();     // mô tả
            $table->timestamps();                        // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
