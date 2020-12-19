<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsddcashinsTable extends Migration
{

    public function up()
    {
        Schema::create('dsddcashins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deposit_by');
            $table->string('for')->nullable();
            $table->double('amount');
            $table->double('amount_2')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('dsddcashins');
    }
}
