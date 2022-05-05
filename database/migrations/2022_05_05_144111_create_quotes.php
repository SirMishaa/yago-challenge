<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('quote_id');
            $table->boolean('available')->default(true);
            $table->float('coverage_ceiling');
            $table->float('deductible');
            $table->float('after_delivery');
            $table->float('after_liability');
            $table->float('professional_indemnity');
            $table->float('entrusted_objects');
            $table->float('legal_expenses');

            $table->foreignId('user_lead_id')
                ->constrained('user_leads')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
