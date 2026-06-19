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
        Schema::create('nursings', function (Blueprint $table) {

    $table->id();

    $table->string('nursing_no')->unique();

    $table->unsignedBigInteger('patient_id');

    $table->unsignedBigInteger('doctor_id');

    $table->unsignedBigInteger('staff_id');

    $table->date('nursing_date');

    $table->text('care_notes')->nullable();

    $table->text('medication_notes')->nullable();

    $table->enum('status',[
        'active',
        'completed',
        'cancelled'
    ])->default('active');

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
        Schema::dropIfExists('nursings');
    }
};
