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
        Schema::create('phone_book_details', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('phone_number_one');
            $table->string('phone_number_two');
            $table->string('name');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_book_details');
    }
};
