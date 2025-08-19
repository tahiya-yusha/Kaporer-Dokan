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
        Schema::create('tshirtprints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tshirtorders_id');
            $table->string('image')->nullable();
            $table->foreign('tshirtorders_id')->references('id')->on('tshirtorders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tshirtprints');
    }
};
