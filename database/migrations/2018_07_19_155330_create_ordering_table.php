<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordering', function (Blueprint $table) {
            $table->increments('id');
            $table->text("name");
            $table->text("surname");
            $table->text("patronymic");
            $table->text("phoneNumber");
            $table->integer("destination");
            $table->integer("product");
            $table->integer("totalCost");
            $table->text("deliveryAddress");
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
        Schema::dropIfExists('ordering');
    }
}
