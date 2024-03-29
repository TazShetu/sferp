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
            $table->integer('mesh_size_1')->nullable();
            $table->integer('mesh_size_2')->nullable();
            $table->integer('mesh_size_3')->nullable();
            $table->string('mesh_size_unit')->nullable();
            $table->float('depth')->nullable();
            $table->string('depth_unit')->nullable();
            $table->float('twin_size_denier')->nullable();
            $table->float('twin_size_ply')->nullable();
            $table->float('twin_size_no')->nullable();
            $table->float('twin_size_mm')->nullable();
            // 3 / 4
            $table->integer('strand')->nullable();
            // Hanks / Coil
            $table->string('coil_type')->nullable();
            $table->float('weight')->nullable();
            $table->integer('frame_no')->nullable();
            $table->float('frame_size_width')->nullable();
            $table->float('frame_size_height')->nullable();
            $table->float('length')->nullable();
            $table->string('grade_no')->nullable();
            $table->string('mfi')->nullable();
            $table->string('mfr')->nullable();
            $table->float('melting_point')->nullable();
            $table->float('density')->nullable();
            $table->string('upload_tds')->nullable();
            $table->string('upload_msds')->nullable();
            $table->string('dropper')->nullable();
            $table->float('body_cm')->nullable();
            $table->float('body_ply')->nullable();
            $table->float('tail_cm')->nullable();
            $table->float('tail_ply')->nullable();
            $table->float('sizeww')->nullable();
            $table->string('sizeww_unit')->nullable();
            $table->string('luster')->nullable();
            $table->string('nominal_denier')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('country_origin')->nullable();
            $table->float('viscosity')->nullable();
            $table->string('relative_density')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }
}
