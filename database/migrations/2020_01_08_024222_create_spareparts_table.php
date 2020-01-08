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
            $table->string('country_origin');
            $table->string('country_purchase');
            $table->string('manufacturer');
            $table->string('manufacture_year');
            $table->string('currency');
            $table->string('unit_price');
            $table->string('unit_price_cnf');
            $table->string('unit_price_fob');
            $table->string('unit_price_dhaka')->nullable();
            $table->string('unit_price_chittagong')->nullable();
            $table->date('purchase_date');
            $table->date('arrival_date');
            $table->string('shipped_by');
            $table->string('name');
            $table->string('description');
            $table->string('code_number');
            $table->string('part_number');
            $table->string('identity_number')->unique();
            $table->string('invoice_number');
            $table->string('lc_number');
            $table->string('note');
            $table->integer('minimum_storage');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('spareparts');
    }
}
