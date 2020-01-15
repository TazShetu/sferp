<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinesTable extends Migration
{
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identification_code')->unique();
            $table->integer('machinecategory_id');
            $table->string('factory_id');
            $table->string('manufacturer');
            $table->string('manufacture_year');
            $table->string('manufacture_country');
            $table->string('type');
            $table->float('rope_size_from')->nullable();
            $table->float('rope_size_to')->nullable();
            $table->float('size_range_from')->nullable();
            $table->float('size_range_to')->nullable();
            $table->string('sk_dk')->nullable();
            $table->float('pitch_size')->nullable();
            $table->float('spool_diameter')->nullable();
            $table->integer('number_of_shuttles')->nullable();
            $table->float('screw_size')->nullable();
            $table->float('production_capacity')->nullable();
            $table->float('ld_ratio')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
