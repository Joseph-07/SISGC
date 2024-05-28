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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('description');
            $table->string('url_document');

            $table->unsignedBigInteger('id_personal');
            $table->unsignedBigInteger('id_system');
            $table->unsignedBigInteger('id_proc');
            $table->unsignedBigInteger('id_type_doc');
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_clas');
            $table->unsignedBigInteger('id_spec');


            $table->foreign('id_personal')->references('id')->on('personals');
            $table->foreign('id_system')->references('id')->on('systs');
            $table->foreign('id_proc')->references('id')->on('procs');
            $table->foreign('id_type_doc')->references('id')->on('type_docs');
            $table->foreign('id_category')->references('id')->on('categories');
            $table->foreign('id_clas')->references('id')->on('clas');
            $table->foreign('id_spec')->references('id')->on('specialities');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
