<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActualMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('actual_measures', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('measure_id')->unsigned();
          $table->integer('month');
          $table->double('actual_measure', 15, 2);
          $table->integer('status')->default(0);
          $table->timestamps();

          $table->foreign('measure_id')
                ->references('id')
                ->on('measures')
                ->onUpdate('cascade')
                ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('actual_measures');
    }
}
