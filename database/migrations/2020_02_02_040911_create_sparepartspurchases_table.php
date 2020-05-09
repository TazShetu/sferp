<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartspurchasesTable extends Migration
{

    public function up()
    {
        Schema::create('sparepartspurchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('spareparts_id')->index();
            $table->integer('quantity');
            $table->string('unit');
            $table->string('country_origin')->nullable();
            $table->string('country_purchase');
//            $table->string('manufacturer');
            $table->string('manufacture_year');
            $table->string('currency');
            $table->float('unit_price');
            $table->float('unit_price_2')->nullable();
            $table->float('unit_price_cnf')->nullable();;
            $table->float('unit_price_cnf_2')->nullable();
            $table->float('unit_price_fob')->nullable();;
            $table->float('unit_price_fob_2')->nullable();
            $table->float('cnf_price_dhaka')->nullable();
            $table->float('cnf_price_dhaka_2')->nullable();
            $table->float('cnf_price_chittagong')->nullable();
            $table->float('cnf_price_chittagong_2')->nullable();
            $table->float('total_price');
            $table->float('total_price_2')->nullable();
            $table->date('purchase_date');
            $table->date('arrival_date');
            $table->string('shipped_by');
//            $table->string('name');
//            $table->string('description');
//            $table->string('code_number');
//            $table->string('part_number');
//            $table->string('identity_number')->unique();
            $table->string('invoice_number');
            $table->string('lc_number');
            $table->string('note');
            $table->string('status')->default('pending');
//            $table->integer('minimum_storage');
            $table->integer('user_id');
            $table->integer('edit_user_id')->nullable();
            $table->integer('receive_user_id')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('sparepartspurchases');
    }
}
