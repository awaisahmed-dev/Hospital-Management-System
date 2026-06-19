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
        Schema::create('schedulings', function (Blueprint $table) {

            $table->id();

            $table->string('schedule_no')->unique();

            $table->unsignedBigInteger('patient_id');

            $table->unsignedBigInteger('doctor_id');

            $table->date('appointment_date');

            $table->time('appointment_time');

            $table->string('purpose')->nullable();

            $table->text('remarks')->nullable();

            $table->enum('status',[
                'scheduled',
                'completed',
                'cancelled'
            ])->default('scheduled');

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
        Schema::dropIfExists('schedulings');
    }
};
