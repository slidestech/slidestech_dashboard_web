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
        Schema::create('communes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');

            $table->unsignedInteger('state_id')->nullable();
            $table->foreign('state_id')
                ->references('id')->on('states')
                ->onDelete('set null');

            $table->unsignedInteger('center_id')->nullable();
            $table->foreign('center_id')
                ->references('id')->on('centers')
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
        Schema::dropIfExists('communes');
    }
};
