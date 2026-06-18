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
    Schema::create('patients', function (Blueprint $table) {

        $table->id();

        $table->string('mr_no')->unique();
        
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');
        
        $table->enum('gender', [
            'male',
            'female',
            'other'
        ]);
        
        $table->date('dob')->nullable();
        
        $table->string('cnic')->nullable();
        $table->string('passport_no')->nullable();
        
        $table->string('phone');
        $table->string('alternate_phone')->nullable();
        
        $table->string('email')->nullable();
        
        $table->string('blood_group')->nullable();
        
        $table->enum('marital_status', [
            'single',
            'married',
            'divorced',
            'widowed'
        ])->nullable();
        
        $table->text('address')->nullable();
        
        $table->string('city')->nullable();
        $table->string('province')->nullable();
        $table->string('country')->nullable();
        
        $table->string('guardian_name')->nullable();
        $table->string('guardian_phone')->nullable();
        
        $table->string('emergency_contact')->nullable();
        
        $table->string('occupation')->nullable();
        
        $table->string('insurance_company')->nullable();
        $table->string('insurance_number')->nullable();
        
        $table->enum('status', [
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
        Schema::dropIfExists('patients');
    }
};
