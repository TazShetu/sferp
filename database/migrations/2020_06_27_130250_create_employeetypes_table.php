<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeetypesTable extends Migration
{
    public function up()
    {
        Schema::create('employeetypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('employeetypes');
    }
}
