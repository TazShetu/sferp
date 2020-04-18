<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawmaterialstoresTable extends Migration
{

    public function up()
    {
        Schema::create('rawmaterialstores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rawmaterial_id')->index();
            $table->integer('quantity');
            $table->integer('warehouse_id')->index();
            $table->integer('floor_id')->nullable();
            $table->integer('room_id')->nullable();
            $table->integer('user_id');
//            $table->integer('edit_user_id')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('rawmaterialstores');
    }
}
