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
        Schema::create('branches', function (Blueprint $table) {

    $table->id();

    $table->string('branch_code')->unique();

    $table->string('name');

    $table->string('phone')->nullable();

    $table->string('email')->nullable();

    $table->text('address')->nullable();

    $table->string('city')->nullable();

    $table->string('country')->nullable();

    $table->integer('total_rooms')
          ->default(0);

    $table->integer('total_beds')
          ->default(0);

    $table->string('manager_name')->nullable();

    $table->string('manager_phone')->nullable();

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
        Schema::dropIfExists('branches');
    }
};
