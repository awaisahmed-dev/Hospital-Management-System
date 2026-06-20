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
        Schema::create('billings', function (Blueprint $table) {

            $table->id();

            $table->string('billing_no')->unique();

            $table->unsignedBigInteger('invoice_id');

            $table->unsignedBigInteger('patient_id');

            $table->date('billing_date');

            $table->decimal('subtotal',12,2)->default(0);

            $table->decimal('discount',12,2)->default(0);

            $table->decimal('tax',12,2)->default(0);

            $table->decimal('total_amount',12,2)->default(0);

            $table->text('remarks')->nullable();

            $table->enum('status',[
                'pending',
                'paid',
                'cancelled'
            ])->default('pending');

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
        Schema::dropIfExists('billings');
    }
};
