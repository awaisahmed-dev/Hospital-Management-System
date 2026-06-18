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
    Schema::create('appointments', function (Blueprint $table) {

    $table->id();

    $table->string('appointment_no')->unique();

    $table->foreignId('patient_id');

    $table->foreignId('doctor_id');

    $table->date('appointment_date');

    $table->time('appointment_time');

    $table->integer('token_no')->nullable();

    $table->string('visit_type')->nullable();

    $table->string('appointment_source')->nullable();

    $table->decimal('consultation_fee',12,2)
          ->default(0);

    $table->text('symptoms')->nullable();

    $table->text('doctor_notes')->nullable();

    $table->enum('status',[
        'pending',
        'confirmed',
        'completed',
        'cancelled',
        'rescheduled'
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
        Schema::dropIfExists('appointments');
    }
};
