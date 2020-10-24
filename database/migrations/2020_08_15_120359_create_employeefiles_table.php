<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeefilesTable extends Migration
{

    public function up()
    {
        Schema::create('employeefiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id')->index();
            $table->string('description')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('employeefiles');
    }
}
