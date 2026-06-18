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
        Schema::create('rooms', function (Blueprint $table) {

    $table->id();

    $table->unsignedBigInteger('branch_id');

    $table->string('room_no');

    $table->string('room_name')->nullable();

    $table->string('room_type');

    $table->integer('floor_no')
          ->default(1);

    $table->integer('capacity')
          ->default(1);

    $table->decimal('room_charges',12,2)
          ->default(0);

    $table->text('description')->nullable();

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
        Schema::dropIfExists('rooms');
    }
};
