<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsdcprodustsalesTable extends Migration
{

    public function up()
    {
        Schema::create('dsdcprodustsales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->decimal('quantity');
            $table->string('note')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('dsdcprodustsales');
    }
}
