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
        Schema::create('discharges', function (Blueprint $table) {

            $table->id();

            $table->string('discharge_no')
                  ->unique();

            $table->unsignedBigInteger('admission_id');

            $table->unsignedBigInteger('patient_id');

            $table->unsignedBigInteger('doctor_id');

            $table->date('discharge_date');

            $table->text('discharge_summary')
                  ->nullable();

            $table->text('final_diagnosis')
                  ->nullable();

            $table->text('instructions')
                  ->nullable();

            $table->enum('status',[
                'pending',
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
        Schema::dropIfExists('discharges');
    }
};
