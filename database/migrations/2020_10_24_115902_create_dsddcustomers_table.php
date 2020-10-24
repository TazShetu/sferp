<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsddcustomersTable extends Migration
{

    public function up()
    {
        Schema::create('dsddcustomers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id');
            $table->string('payment_type');
            $table->float('amount');
            $table->float('amount_2')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('dsddcustomers');
    }
}
