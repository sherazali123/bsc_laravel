<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('measures', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('initiative_id')->unsigned();
          $table->string('name');
          $table->longText('description')->nullable();
          $table->double('target', 15, 2);
          $table->integer('status')->default(0);
          $table->timestamps();

          $table->foreign('initiative_id')
                ->references('id')
                ->on('initiatives')
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
          Schema::drop('measures');
    }
}
