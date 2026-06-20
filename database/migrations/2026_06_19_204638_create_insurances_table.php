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
        Schema::create('insurances', function (Blueprint $table) {

            $table->id();

            $table->string('insurance_no')->unique();

            $table->unsignedBigInteger('patient_id');

            $table->string('provider_name');

            $table->string('policy_no');

            $table->decimal('coverage_amount',12,2)
                  ->default(0);

            $table->date('start_date');

            $table->date('end_date')
                  ->nullable();

            $table->text('remarks')
                  ->nullable();

            $table->enum('status',[
                'active',
                'expired',
                'cancelled'
            ])->default('active');

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
        Schema::dropIfExists('insurances');
    }
};
