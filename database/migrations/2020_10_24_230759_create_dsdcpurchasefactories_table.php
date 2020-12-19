<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsdcpurchasefactoriesTable extends Migration
{

    public function up()
    {
        Schema::create('dsdcpurchasefactories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('to');
            $table->string('for');
            $table->double('amount');
            $table->double('amount_2')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('dsdcpurchasefactories');
    }
}
