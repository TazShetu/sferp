<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawmaterialsTable extends Migration
{

    public function up()
    {
        Schema::create('rawmaterials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('manufacturer');
            $table->string('country_origin');
            $table->string('grade_number');
            $table->string('auto_id');
            $table->float('melting_flow_index')->nullable();
            $table->string('melting_point')->nullable();
            $table->float('viscosity')->nullable();
            $table->string('relative_density')->nullable();
            $table->string('density')->nullable();
            $table->integer('minimum_storage');
            $table->string('unit');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('rawmaterials');
    }
}
