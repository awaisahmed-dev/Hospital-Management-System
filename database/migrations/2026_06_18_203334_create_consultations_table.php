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
        Schema::create('consultations', function (Blueprint $table) {

        $table->id();

        $table->unsignedBigInteger('appointment_id');

        $table->unsignedBigInteger('patient_id');

        $table->unsignedBigInteger('doctor_id');

        $table->date('consultation_date');

        $table->text('chief_complaint')->nullable();

        $table->text('history')->nullable();

        $table->text('diagnosis')->nullable();

        $table->text('treatment_plan')->nullable();

        $table->text('doctor_notes')->nullable();

        $table->enum('status',[
            'pending',
            'completed'
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
        Schema::dropIfExists('consultations');
    }
};
