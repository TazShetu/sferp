<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsdclocaltransportsTable extends Migration
{

    public function up()
    {
        Schema::create('dsdclocaltransports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('to');
            $table->string('for');
            $table->float('amount');
            $table->date('date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('dsdclocaltransports');
    }
}
