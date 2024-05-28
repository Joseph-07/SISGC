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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->text('comment');
            $table->unsignedBigInteger('id_personal');
            $table->unsignedBigInteger('id_course');
            $table->foreign('id_personal')->references('id')->on('personals');
            $table->foreign('id_course')->references('id')->on('courses');
            $table->timestamps();
        });

        Schema::create('personal_x_course', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_personal');
            $table->unsignedBigInteger('id_course');
            $table->foreign('id_personal')->references('id')->on('personals');
            $table->foreign('id_course')->references('id')->on('courses');

            $table->integer('grade');
            $table->boolean('approved');
            $table->boolean('test_permision');


            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('personal_x_course');
    }
};
