<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsdcbankdepositsTable extends Migration
{

    public function up()
    {
        Schema::create('dsdcbankdeposits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bankaccount_id');
            $table->float('amount');
            $table->float('amount_2')->nullable();
            $table->string('payment_type');
            $table->string('info');
            $table->date('date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('dsdcbankdeposits');
    }
}