<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartsTable extends Migration
{

    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacturer');
            $table->string('model');
            $table->string('type');
            $table->string('description');
            $table->string('part_number');
            $table->string('identity_number');
            $table->string('code_number');
            $table->integer('minimum_storage');
            $table->string('unit');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('spareparts');
    }
}
