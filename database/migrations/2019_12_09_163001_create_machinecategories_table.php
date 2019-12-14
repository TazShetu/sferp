<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinecategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('machinecategories', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->string('name');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('machinecategories');
    }
}
