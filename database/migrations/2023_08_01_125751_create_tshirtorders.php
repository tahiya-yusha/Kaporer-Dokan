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
        Schema::create('tshirtorders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Column to store the user ID
            $table->string('tshirt_type');
            $table->string('tshirt_length');
            $table->string('color');
            $table->string('print_positions');
            $table->string('user_text')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tshirtorders');
    }
};
