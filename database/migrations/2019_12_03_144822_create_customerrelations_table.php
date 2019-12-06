<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerrelationsTable extends Migration
{

    public function up()
    {
        Schema::create('customerrelations', function (Blueprint $table) {
//            $table->bigIncrements('id');
            $table->integer('parent_id')->index();
            $table->integer('parent_type_id')->index();
            $table->integer('child_id')->index();
            $table->integer('child_type_id')->index();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('customerrelations');
    }
}
