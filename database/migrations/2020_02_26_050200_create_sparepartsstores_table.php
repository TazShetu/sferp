<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartsstoresTable extends Migration
{

    public function up()
    {
        Schema::create('sparepartsstores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('spareparts_id')->index();
            $table->integer('quantity');
            $table->integer('sroom_id')->index();
            $table->integer('row_id')->nullable();
            $table->integer('rack_id')->nullable();
            $table->integer('user_id');
//            $table->integer('edit_user_id')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('sparepartsstores');
    }
}
