<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeFactoryTable extends Migration
{
    public function up()
    {
        Schema::create('employee_factory', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->integer('employee_id')->index();
            $table->integer('factory_id')->index();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('employee_factory');
    }
}
