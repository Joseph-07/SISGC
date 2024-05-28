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
        Schema::create('speciality_x_personal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_spec');
            $table->unsignedBigInteger('id_personal');
            $table->foreign('id_spec')->references('id')->on('specialities');
            $table->foreign('id_personal')->references('id')->on('personals');
            $table->timestamps();
        });

        Schema::create('term_glosary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proc');
            $table->foreign('id_proc')->references('id')->on('procs');
            $table->text('term');
            $table->longText('description');            
            $table->timestamps();
        });

        Schema::create('type_tests', function (Blueprint $table) {
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
        Schema::dropIfExists('speciality_x_personal');
        Schema::dropIfExists('term_glosary');
        Schema::dropIfExists('Type_test');
    }
};
