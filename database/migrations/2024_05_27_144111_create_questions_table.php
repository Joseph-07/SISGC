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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('enunce');
            $table->integer('order');
            $table->string('image')->nullable();
            $table->string('image_name')->nullable();
            $table->string('group')->nullable();
            $table->boolean('require_jus');
            $table->unsignedBigInteger('id_test');
            $table->foreign('id_test')->references('id')->on('tests');
            $table->unsignedBigInteger('id_type_question');
            $table->foreign('id_type_question')->references('id')->on('type_questions');
            $table->timestamps();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->text('enunce');
            $table->boolean('right');
            $table->integer('order');
            $table->integer('value');
            $table->unsignedBigInteger('id_question');
            $table->foreign('id_question')->references('id')->on('questions');
            $table->timestamps();
        });

        Schema::create('personal_x_test', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_test');
            $table->foreign('id_test')->references('id')->on('tests');
            $table->unsignedBigInteger('id_personal');
            $table->foreign('id_personal')->references('id')->on('personals');
            $table->integer('grade');
            $table->timestamp('started_at');
            $table->timestamp('finished_at');
            $table->timestamps();
        });

        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_test');
            $table->unsignedBigInteger('id_personal');
            $table->unsignedBigInteger('id_question');
            $table->unsignedBigInteger('id_answer');
            $table->unsignedBigInteger('id_personal_x_test');
            $table->longText('justification')->nullable();

            $table->foreign('id_test')->references('id')->on('tests');
            $table->foreign('id_personal')->references('id')->on('personals');
            $table->foreign('id_question')->references('id')->on('questions');
            $table->foreign('id_answer')->references('id')->on('answers');
            $table->foreign('id_personal_x_test')->references('id')->on('personal_x_test');

            $table->timestamps();
        });

        Schema::create('learning_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_personal');
            $table->foreign('id_personal')->references('id')->on('personals');
            $table->double('p_audio');
            $table->double('p_visual');
            $table->double('p_kines');
            $table->text('recomendation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('personal_x_test');
        Schema::dropIfExists('test_results');
    }
};
