<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailySheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_sheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->double('opening_balance');
            $table->double('opening_balance_2')->nullable();
            $table->double('closing_balance')->nullable();
            $table->double('closing_balance_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_sheets');
    }
}
