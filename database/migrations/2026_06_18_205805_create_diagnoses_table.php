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
        Schema::create('diagnoses', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('consultation_id');

            $table->unsignedBigInteger('patient_id');

            $table->unsignedBigInteger('doctor_id');

            $table->date('diagnosis_date');

            $table->string('disease_name');

            $table->string('icd_code')->nullable();

            $table->text('symptoms')->nullable();

            $table->text('findings')->nullable();

            $table->text('remarks')->nullable();

            $table->enum('status',[
                'active',
                'inactive'
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
        Schema::dropIfExists('diagnoses');
    }
};
