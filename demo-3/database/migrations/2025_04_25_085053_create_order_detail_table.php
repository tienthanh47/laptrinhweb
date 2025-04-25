<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->onDelete('cascade');           // liên kết đến orders.id
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->onDelete('cascade');           // liên kết đến products.id
            $table->integer('quantity');           // số lượng sản phẩm trong đơn
            $table->text('notes')->nullable();     // ghi chú
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
