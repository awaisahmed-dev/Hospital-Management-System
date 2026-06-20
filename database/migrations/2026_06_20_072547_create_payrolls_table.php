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
        Schema::create('payrolls', function (Blueprint $table) {

    $table->id();

    $table->string('payroll_no')->unique();

    $table->string('employee_name');

    $table->decimal('salary',12,2);

    $table->date('payroll_date');

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
        Schema::dropIfExists('payrolls');
    }
};
