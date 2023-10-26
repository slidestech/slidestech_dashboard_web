<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('document_id');

            $table->foreign('question_id')->references('id')
                 ->on('questions')->onDelete('cascade');
            $table->foreign('document_id')->references('id')
                ->on('documents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions_documents');
    }
};
