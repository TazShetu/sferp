<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeedetailsTable extends Migration
{
    public function up()
    {
        Schema::create('employeedetails', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->integer('employee_id')->index();
            $table->string('name_bengali')->nullable();
            $table->date('dob')->nullable();
            $table->string('m_status')->nullable();
            $table->string('b_number')->nullable();
            $table->string('nid')->nullable();
            $table->string('school_ssc')->nullable();
            $table->string('date_ssc')->nullable();
            $table->string('result_ssc')->nullable();
            $table->string('school_hsc')->nullable();
            $table->string('date_hsc')->nullable();
            $table->string('result_hsc')->nullable();
            $table->string('institute_graduation')->nullable();
            $table->string('date_graduation')->nullable();
            $table->string('result_graduation')->nullable();
            $table->string('institute_Pgraduation')->nullable();
            $table->string('date_Pgraduation')->nullable();
            $table->string('result_Pgraduation')->nullable();
            $table->text('current_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('permanent_address_bengali')->nullable();
            $table->string('mobile_1')->nullable();
            $table->string('mobile_2')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_mobile_1')->nullable();
            $table->string('spouse_mobile_2')->nullable();
            $table->string('spouse_nid')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_nid')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_nid')->nullable();
            $table->string('mother_profession')->nullable();
            $table->string('sibling_1_name')->nullable();
            $table->string('sibling_1_profession')->nullable();
            $table->string('sibling_2_name')->nullable();
            $table->string('sibling_2_profession')->nullable();
            $table->string('sibling_3_name')->nullable();
            $table->string('sibling_3_profession')->nullable();

            $table->string('company_1')->nullable();
            $table->string('designation_1')->nullable();
            $table->date('from_1')->nullable();
            $table->date('to_1')->nullable();
            $table->string('duration_1')->nullable();
            $table->string('company_2')->nullable();
            $table->string('designation_2')->nullable();
            $table->date('from_2')->nullable();
            $table->date('to_2')->nullable();
            $table->string('duration_2')->nullable();
            $table->string('company_3')->nullable();
            $table->string('designation_3')->nullable();
            $table->date('from_3')->nullable();
            $table->date('to_3')->nullable();
            $table->string('duration_3')->nullable();


            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('employeedetails');
    }
}
