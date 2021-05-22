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
            $table->double('amount');
            $table->double('amount_2')->nullable();
            $table->string('unit');
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
