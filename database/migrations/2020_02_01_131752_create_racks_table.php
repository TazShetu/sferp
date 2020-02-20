<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacksTable extends Migration
{

    public function up()
    {
        Schema::create('racks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sroom_id')->index();
            $table->integer('row_id')->index();
            $table->string('name');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('racks');
    }
}
