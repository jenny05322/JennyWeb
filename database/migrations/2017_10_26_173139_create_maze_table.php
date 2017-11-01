<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMazeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mazes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('targetType');
            $table->string('targetId');
            $table->integer('width');
            $table->integer('height');
            $table->text('mazeData');
            $table->integer('location')->default(0);
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
        Schema::dropIfExists('mazes');
    }
}
