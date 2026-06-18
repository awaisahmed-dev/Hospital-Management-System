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
        Schema::create('beds', function (Blueprint $table) {

    $table->id();

    $table->unsignedBigInteger('room_id');

    $table->string('bed_no');

    $table->string('bed_type')->nullable();

    $table->decimal('daily_charges',12,2)
          ->default(0);

    $table->enum('availability',[
        'available',
        'occupied',
        'maintenance'
    ])->default('available');

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
        Schema::dropIfExists('beds');
    }
};
