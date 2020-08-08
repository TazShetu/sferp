<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{

    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('factory_id');
            $table->integer('designation_id');
            $table->string('name');
            $table->string('mobile');
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('nid')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
