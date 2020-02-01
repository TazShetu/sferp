<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
            $table->float('size_denier')->nullable();
            $table->float('size_mm')->nullable();
            $table->string('plys')->nullable();
            $table->float('mesh_size')->nullable();
            $table->float('depth')->nullable();
            $table->float('twin_size')->nullable();
            $table->string('twist_type')->nullable();
            $table->string('twist_condition')->nullable();
            $table->string('strand')->nullable();
            $table->integer('minimum_storage');
            $table->string('unit');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }
}
