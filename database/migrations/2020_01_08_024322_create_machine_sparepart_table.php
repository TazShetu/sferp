<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachineSparepartTable extends Migration
{

    public function up()
    {
        Schema::create('machine_spareparts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('machine_id');
            $table->integer('spareparts_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('machine_spareparts');
    }
}
