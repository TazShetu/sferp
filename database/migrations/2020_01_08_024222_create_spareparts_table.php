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
            $table->string('part_number');
            $table->string('identity_number')->unique();
            $table->string('code_number');
            $table->integer('minimum_storage');
            $table->string('unit');
            $table->timestamps();


//            $table->bigIncrements('id');
//            $table->string('country_origin');
//            $table->string('country_purchase');
//            $table->string('manufacturer');
//            $table->string('manufacture_year');
//            $table->string('currency');
//            $table->float('unit_price');
//            $table->float('unit_price_cnf');
//            $table->float('unit_price_fob');
//            $table->float('cnf_price_dhaka')->nullable();
//            $table->float('cnf_price_chittagong')->nullable();
//            $table->date('purchase_date');
//            $table->date('arrival_date');
//            $table->string('shipped_by');
//            $table->string('name');
//            $table->string('description');
//            $table->string('code_number');
//            $table->string('part_number');
//            $table->string('identity_number')->unique();
//            $table->string('invoice_number');
//            $table->string('lc_number');
//            $table->string('note');
//            $table->integer('minimum_storage');
//            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('spareparts');
    }
}
