<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawmaterialpurchasesTable extends Migration
{

    public function up()
    {
        Schema::create('rawmaterialpurchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rawmaterial_id')->index();
            $table->date('invoice_date');
            $table->string('invoice_number');
            $table->string('description');
            $table->string('hs_code');
            $table->integer('quantity');
            $table->string('unit');
            $table->float('cnf_dhaka')->nullable();
            $table->float('cnf_dhaka_2')->nullable();
            $table->float('cnf_ctg')->nullable();
            $table->float('cnf_ctg_2')->nullable();
            $table->float('price_per_unit');
            $table->float('price_per_unit_2')->nullable();
            $table->string('currency');
            $table->float('total_price');
            $table->float('total_price_2')->nullable();
            $table->string('purchase_from');
            $table->date('indented_date');
            $table->string('indented_by');
            $table->string('imported_by');
            $table->string('lc_number');
            $table->string('port_of_landing');
            $table->string('status')->default('pending');
//            $table->integer('warehouse_id')->index();
//            $table->integer('floor_id')->nullable();
//            $table->integer('room_id')->nullable();
            $table->integer('user_id');
            $table->integer('edit_user_id')->nullable();
            $table->integer('receive_user_id')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('rawmaterialpurchases');
    }
}
