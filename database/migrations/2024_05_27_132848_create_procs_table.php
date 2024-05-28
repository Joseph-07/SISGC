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
        Schema::create('procs', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('description');
            $table->unsignedBigInteger('id_system');
            $table->foreign('id_system')->references('id')->on('systs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procs');
    }
};
