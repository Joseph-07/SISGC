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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('descripcion');
            $table->unsignedBigInteger('id_personal');
            $table->unsignedBigInteger('id_system');
            $table->unsignedBigInteger('id_clas');
            $table->unsignedBigInteger('id_spec');
            $table->unsignedBigInteger('id_proc');
            $table->foreign('id_personal')->references('id')->on('personals');
            $table->foreign('id_system')->references('id')->on('systs');
            $table->foreign('id_clas')->references('id')->on('clas');
            $table->foreign('id_spec')->references('id')->on('specialities');
            $table->foreign('id_proc')->references('id')->on('procs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
