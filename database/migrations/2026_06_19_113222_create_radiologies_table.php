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
        Schema::create('radiologies', function (Blueprint $table) {

    $table->id();

    $table->string('radiology_no')->unique();

    $table->unsignedBigInteger('consultation_id')->nullable();

    $table->unsignedBigInteger('patient_id');

    $table->unsignedBigInteger('doctor_id');

    $table->string('scan_name');

    $table->string('scan_type')->nullable();

    $table->decimal('scan_fee',12,2)
          ->default(0);

    $table->date('order_date');

    $table->date('report_date')
          ->nullable();

    $table->text('findings')
          ->nullable();

    $table->text('impression')
          ->nullable();

    $table->enum('status',[
        'pending',
        'scheduled',
        'completed',
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
        Schema::dropIfExists('radiologies');
    }
};
