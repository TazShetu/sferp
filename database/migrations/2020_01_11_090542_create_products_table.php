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
            $table->string('identification')->unique();
            $table->integer('producttype_id');
            $table->string('name');
            $table->string('unit');
            $table->integer('minimum_storage');
            // small / big
            $table->string('size')->nullable();
            $table->float('size_denier')->nullable();
            $table->float('size_mm')->nullable();
            $table->integer('plys')->nullable();
            $table->float('mesh_size_mm')->nullable();
            $table->float('mesh_size_inch')->nullable();
            $table->float('depth')->nullable();
            $table->float('twin_size')->nullable();
            // Deiner / Ply / No / mm (dropdown)
            $table->string('twin_size_unit')->nullable();
            // 3 / 4
            $table->integer('strand')->nullable();
            // Hanks / Coil
            $table->string('coil_type')->nullable();
            $table->float('length')->nullable();
            $table->string('grade_no')->nullable();
            $table->string('mfi')->nullable();
            $table->string('mfr')->nullable();
            $table->float('melting_point')->nullable();
            $table->float('density')->nullable();
            $table->float('upload_tds')->nullable();
            $table->float('upload_msds')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }
}
