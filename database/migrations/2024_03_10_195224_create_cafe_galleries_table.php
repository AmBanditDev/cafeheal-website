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
        Schema::create('cafe_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cafe_id');
            $table->string('image_main');
            $table->string('subimage_1');
            $table->string('subimage_2');
            $table->string('subimage_3');
            $table->string('subimage_4');
            $table->timestamps();

            // define foreign key
            $table->foreign('cafe_id')
                ->references('id')
                ->on('cafes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cafe_galleries');
    }
};
