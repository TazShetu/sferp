<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsdccashpaymentsTable extends Migration
{

    public function up()
    {
        Schema::create('dsdccashpayments', function (Blueprint $table) {
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
        Schema::dropIfExists('dsdccashpayments');
    }
}
