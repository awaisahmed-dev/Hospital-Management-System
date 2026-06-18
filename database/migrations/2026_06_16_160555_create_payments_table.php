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
    Schema::create('payments', function (Blueprint $table) {

    $table->id();

    $table->string('payment_no')->unique();

    $table->foreignId('bill_id');

    $table->decimal('amount',12,2);

    $table->date('payment_date');

    $table->string('payment_method');

    $table->string('transaction_id')->nullable();

    $table->string('bank_name')->nullable();

    $table->string('reference_no')->nullable();

    $table->text('remarks')->nullable();

    $table->enum('status',['active','inactive'])
          ->default('active');

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
        Schema::dropIfExists('payments');
    }
};
