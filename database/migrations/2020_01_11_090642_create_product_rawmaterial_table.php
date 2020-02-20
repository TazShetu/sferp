<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRawmaterialTable extends Migration
{

    public function up()
    {
        Schema::create('product_rawmaterial', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->integer('rawmaterial_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('product_rawmaterial');
    }
}
