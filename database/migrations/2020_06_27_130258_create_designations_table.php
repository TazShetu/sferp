<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignationsTable extends Migration
{

    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employeetype_id');
            $table->string('title');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('designations');
    }
}
