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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->longText('description');
            $table->boolean('random');
            $table->date('date');
            $table->time('time');
            $table->integer('grade_max');
            $table->integer('grade_min');
            $table->unsignedBigInteger('id_course');
            $table->unsignedBigInteger('id_personal');
            $table->unsignedBigInteger('id_type_test');
            $table->foreign('id_type_test')->references('id')->on('type_tests');
            $table->foreign('id_personal')->references('id')->on('personals');
            $table->foreign('id_course')->references('id')->on('courses');
            $table->timestamps();
        });

        Schema::create('type_questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
        Schema::dropIfExists('Type_questions');
    }
};
