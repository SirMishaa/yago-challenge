<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('user_leads', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index()->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number')->nullable(true);
            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_lead');
    }
};
