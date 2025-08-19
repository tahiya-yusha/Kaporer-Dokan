<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tshirts', function (Blueprint $table) {
            $table->id();
            $table->string('tshirt_type');
            $table->string('tshirt_length');
            $table->string('color1');
            $table->string('color2');
            $table->string('color3');
            $table->string('print_positions');
            $table->string('image_path')->nullable();
            $table->string('user_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tshirt');
    }
};
