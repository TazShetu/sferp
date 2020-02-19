<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerproductdiscountsTable extends Migration
{

    public function up()
    {
        Schema::create('customerproductdiscounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->index();
            $table->integer('product_id')->index();
            $table->float('discount');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('customerproductdiscounts');
    }
}
