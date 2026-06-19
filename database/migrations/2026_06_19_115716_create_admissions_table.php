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
        Schema::create('admissions', function (Blueprint $table) {


            $table->id();
            
            $table->string('admission_no')->unique();
            
            $table->unsignedBigInteger('patient_id');
            
            $table->unsignedBigInteger('doctor_id');
            
            $table->unsignedBigInteger('room_id')->nullable();
            
            $table->unsignedBigInteger('bed_id')->nullable();
            
            $table->date('admission_date');
            
            $table->string('admission_type')->nullable();
            
            $table->string('reason')->nullable();
            
            $table->text('remarks')->nullable();
            
            $table->enum('status',[
                'admitted',
                'discharged',
                'cancelled'
            ])->default('admitted');
            
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
        Schema::dropIfExists('admissions');
    }
};
