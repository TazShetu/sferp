<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningbalancestoresTable extends Migration
{

    public function up()
    {
        Schema::create('openingbalancestores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->double('closing_balance');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('openingbalancestores');
    }
}
