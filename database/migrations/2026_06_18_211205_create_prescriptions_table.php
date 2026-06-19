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
        Schema::create('prescriptions', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('consultation_id');

            $table->unsignedBigInteger('patient_id');

            $table->unsignedBigInteger('doctor_id');

            $table->unsignedBigInteger('diagnosis_id')
                  ->nullable();

            $table->string('prescription_no')
                  ->unique();

            $table->text('medicine_details');

            $table->text('instructions')
                  ->nullable();

            $table->integer('duration_days')
                  ->default(0);

            $table->date('prescription_date');

            $table->enum('status',[
                'active',
                'completed',
                'cancelled'
            ])->default('active');

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
        Schema::dropIfExists('prescriptions');
    }
};
