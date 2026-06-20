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
        Schema::create('expenses', function (Blueprint $table) {

    $table->id();

    $table->string('expense_no')->unique();

    $table->string('expense_title');

    $table->decimal(
        'amount',
        12,
        2
    );

    $table->date('expense_date');

    $table->text('remarks')
          ->nullable();

    $table->enum('status',[
        'pending',
        'approved',
        'rejected'
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
        Schema::dropIfExists('expenses');
    }
};
