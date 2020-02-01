<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRowsTable extends Migration
{

    public function up()
    {
        Schema::create('rows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sroom_id')->index();
            $table->string('name');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('rows');
    }
}
