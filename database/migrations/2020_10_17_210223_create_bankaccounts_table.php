<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankaccountsTable extends Migration
{

    public function up()
    {
        Schema::create('bankaccounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('ac_name');
            $table->string('ac_number');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('bankaccounts');
    }
}
