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
        Schema::create('stock_ins', function (Blueprint $table) {

    $table->id();

    $table->string('stockin_no')->unique();

    $table->unsignedBigInteger('product_id');

    $table->integer('quantity');

    $table->decimal('unit_price',12,2);

    $table->decimal('total_amount',12,2);

    $table->date('stockin_date');

    $table->text('remarks')->nullable();

    $table->string('status')->default('received');

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
        Schema::dropIfExists('stock_ins');
    }
};
