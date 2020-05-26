<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerextrasTable extends Migration
{

    public function up()
    {
        Schema::create('customerextras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->index();
            $table->string('type');
            $table->string('details');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('customerextras');
    }
}
