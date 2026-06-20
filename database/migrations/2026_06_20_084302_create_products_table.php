<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

    $table->id();

    $table->string('product_code')->unique();

    $table->unsignedBigInteger('category_id');

    $table->unsignedBigInteger('supplier_id');

    $table->string('product_name');

    $table->decimal('purchase_price',12,2);

    $table->decimal('sale_price',12,2);

    $table->integer('stock_qty')->default(0);

    $table->string('status')->default('active');

    $table->unsignedBigInteger('created_by')->nullable();

    $table->unsignedBigInteger('updated_by')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
