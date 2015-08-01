<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitiativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('initiatives', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('objective_id')->unsigned();
          $table->string('name');
          $table->longText('description')->nullable();
          $table->integer('status')->default(0);
          $table->timestamps();

          $table->foreign('objective_id')
                ->references('id')
                ->on('objectives')
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
        Schema::drop('initiatives');
    }
}
