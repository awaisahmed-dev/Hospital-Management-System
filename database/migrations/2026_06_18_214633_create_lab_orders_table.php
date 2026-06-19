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
        Schema::create('lab_orders', function (Blueprint $table) {

            $table->id();

            $table->string('lab_order_no')->unique();

            $table->unsignedBigInteger('consultation_id')->nullable();

            $table->unsignedBigInteger('patient_id');

            $table->unsignedBigInteger('doctor_id');

            $table->string('test_name');

            $table->string('test_category')->nullable();

            $table->decimal('test_fee',12,2)->default(0);

            $table->date('order_date');

            $table->date('result_date')->nullable();

            $table->text('remarks')->nullable();

            $table->enum('status',[
                'pending',
                'sample_collected',
                'processing',
                'completed',
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
        Schema::dropIfExists('lab_orders');
    }
};
