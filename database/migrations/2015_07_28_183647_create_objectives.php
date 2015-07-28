<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objectives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dimension_id')->unsigned();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('dimension_id')
                  ->references('id')
                  ->on('dimensions')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('objectives');
    }
}
