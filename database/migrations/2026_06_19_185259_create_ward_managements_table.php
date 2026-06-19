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
        Schema::create('ward_managements', function (Blueprint $table) {

    $table->id();

    $table->string('ward_no')->unique();

    $table->unsignedBigInteger('patient_id');

    $table->unsignedBigInteger('doctor_id');

    $table->unsignedBigInteger('room_id');

    $table->unsignedBigInteger('bed_id');

    $table->date('shift_date');

    $table->string('ward_type')->nullable();

    $table->text('notes')->nullable();

    $table->enum('status',[
        'active',
        'transferred',
        'completed'
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
        Schema::dropIfExists('ward_managements');
    }
};
