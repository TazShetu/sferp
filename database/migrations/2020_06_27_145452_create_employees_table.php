<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{

    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
//            $table->integer('factory_id');
            $table->integer('employeetype_id')->index();
            $table->integer('designation_id')->index();
            $table->date('doj');
            $table->string('name');
            $table->string('code');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
