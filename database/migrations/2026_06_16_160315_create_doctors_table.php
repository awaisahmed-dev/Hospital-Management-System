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
    Schema::create('doctors', function (Blueprint $table) {

    $table->id();

    $table->string('employee_no')->unique();

    $table->string('first_name');
    $table->string('middle_name')->nullable();
    $table->string('last_name');

    $table->enum('gender',['male','female','other']);

    $table->date('dob')->nullable();

    $table->string('cnic')->nullable();

    $table->string('phone');
    $table->string('alternate_phone')->nullable();

    $table->string('email')->nullable();

    $table->unsignedBigInteger('department_id')->nullable();

    $table->unsignedBigInteger('specialization_id')->nullable();

    $table->string('medical_license_no')->nullable();

    $table->string('qualification')->nullable();

    $table->integer('experience_years')->default(0);

    $table->date('joining_date')->nullable();

    $table->decimal('consultation_fee',12,2)->default(0);

    $table->decimal('salary',12,2)->default(0);

    $table->string('blood_group')->nullable();

    $table->text('address')->nullable();

    $table->string('city')->nullable();

    $table->string('country')->nullable();

    $table->string('emergency_contact')->nullable();

    $table->string('profile_image')->nullable();

    $table->text('notes')->nullable();

    $table->enum('status',['active','inactive'])
          ->default('active');

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
        Schema::dropIfExists('doctors');
    }
};
