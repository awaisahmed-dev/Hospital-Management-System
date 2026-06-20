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
        Schema::create('invoices', function (Blueprint $table) {

    $table->id();

    $table->string('invoice_no')->unique();

    $table->unsignedBigInteger('patient_id');

    $table->unsignedBigInteger('doctor_id')
          ->nullable();

    $table->decimal('total_amount',12,2)
          ->default(0);

    $table->decimal('paid_amount',12,2)
          ->default(0);

    $table->decimal('balance_amount',12,2)
          ->default(0);

    $table->date('invoice_date');

    $table->text('remarks')
          ->nullable();

    $table->enum('status',[
        'pending',
        'partial',
        'paid',
        'cancelled'
    ])->default('pending');

    $table->unsignedBigInteger('created_by')
          ->nullable();

    $table->unsignedBigInteger('updated_by')
          ->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
