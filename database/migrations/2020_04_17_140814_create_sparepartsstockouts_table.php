<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartsstockoutsTable extends Migration
{

    public function up()
    {
        Schema::create('sparepartsstockouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('spareparts_id')->index();
            $table->integer('quantity');
            $table->integer('sroom_id')->index();
            $table->integer('row_id')->nullable();
            $table->integer('rack_id')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('sparepartsstockouts');
    }
}
