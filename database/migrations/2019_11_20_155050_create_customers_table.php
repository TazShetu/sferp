<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->string('name');
            $table->date('dob');
            $table->string('company_name');
            $table->string('bin');
            $table->string('bin_file')->nullable();
            $table->string('nid');
            $table->string('nid_file')->nullable();
            $table->string('business_address');
            $table->string('business_area');
            $table->string('business_telephone');
            $table->string('business_telephone_2')->nullable();
            $table->string('business_email');
            $table->string('business_email_2')->nullable();
            $table->string('customertype_id');
            $table->string('company_site');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
