<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('currency');
            $table->unsignedTinyInteger('buy_or_sale');
            $table->float('money')->default(0);
            $table->float('rate', 8, 3)->default(0);
            $table->integer('money_TWD')->default(0);
            $table->integer('realized_profit')->default(0);
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
        Schema::dropIfExists('rates');
    }
}
