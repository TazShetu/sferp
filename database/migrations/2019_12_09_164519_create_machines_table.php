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
            $table->string('rope_size_from')->nullable();
            $table->string('rope_size_to')->nullable();
            $table->string('sk_dk')->nullable();
            $table->string('pitch_size')->nullable();
            $table->string('spool_diameter')->nullable();
            $table->string('number_of_shuttles')->nullable();
            $table->string('screw_size')->nullable();
            $table->string('production_capacity')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
