<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('menory');
            $table->string('ram');
            $table->string('cpu');
            $table->float('price');
            $table->float('sale_price');
            $table->integer('quantity');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('config');
    }
}
