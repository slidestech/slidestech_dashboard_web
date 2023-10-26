<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150)->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->foreign('state_id')
                ->references('id')->on('states')
                ->onDelete('set null');


            $table->unsignedInteger('structure_type_id')->nullable();
            $table->foreign('structure_type_id')
                ->references('id')->on('structure_types')
                ->onDelete('set null');

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
        Schema::dropIfExists('structures');
    }
}
