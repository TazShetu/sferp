<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawmaterialproductioninsTable extends Migration
{

    public function up()
    {
        Schema::create('rawmaterialproductionins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rawmaterial_id')->index();
            $table->integer('quantity');
            $table->integer('factory_id')->index();
            $table->integer('machine_id')->index();
            $table->integer('user_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('rawmaterialproductionins');
    }
}
