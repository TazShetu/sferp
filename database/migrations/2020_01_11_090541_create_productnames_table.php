<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductnamesTable extends Migration
{

    public function up()
    {
        Schema::create('productnames', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('display_name');
            $table->string('type_class');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('productnames');
    }
}
