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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_no', 30)->nullable();
            $table->string('mobile_no', 30)->nullable();
            $table->string('email', 75)->nullable();
            $table->string('fax', 75)->nullable();
            $table->string('website', 75)->nullable();
            $table->string('other', 75)->nullable();
            $table->string('contact_person')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
