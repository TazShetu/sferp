<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFloorsTable extends Migration
{
    public function up()
    {
        Schema::create('floors', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->integer('warehouse_id')->index();
            $table->string('name');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('floors');
    }
}
