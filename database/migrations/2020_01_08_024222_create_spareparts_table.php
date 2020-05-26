<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartsTable extends Migration
{

    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacturer');
            $table->string('model');
            $table->string('type');
            $table->string('description');
            $table->string('part_number')->nullable();
            $table->string('identity_number')->nullable();
            $table->string('code_number')->nullable();
            $table->integer('minimum_storage');
            $table->string('unit');
            $table->text('description_2')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('spareparts');
    }
}
