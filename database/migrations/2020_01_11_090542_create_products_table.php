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
            $table->string('plys');
            $table->float('mesh_size');
            $table->float('depth');
            $table->float('twin_size');
            $table->string('twist_type');
            $table->string('twist_condition');
            $table->integer('minimum_storage');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }
}
