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
            $table->string('height_academic')->nullable();
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
            $table->string('ecname_1')->nullable();
            $table->string('ecmobile_1')->nullable();
            $table->string('ecrelation_1')->nullable();
            $table->text('ecaddress_1')->nullable();
            $table->string('ecname_2')->nullable();
            $table->string('ecmobile_2')->nullable();
            $table->string('ecrelation_2')->nullable();
            $table->text('ecaddress_2')->nullable();
            $table->string('baccount_1')->nullable();
            $table->string('baccount_type_1')->nullable();
            $table->string('bank_1')->nullable();
            $table->string('branch_1')->nullable();
            $table->string('baccount_2')->nullable();
            $table->string('baccount_type_2')->nullable();
            $table->string('bank_2')->nullable();
            $table->string('branch_2')->nullable();
            $table->string('baccount_3')->nullable();
            $table->string('baccount_type_3')->nullable();
            $table->string('bank_3')->nullable();
            $table->string('branch_3')->nullable();
            $table->string('bkash')->nullable();
            $table->string('nagad')->nullable();
            $table->string('rocket')->nullable();
            $table->string('ucash')->nullable();
            $table->string('third_party_company')->nullable();
            $table->text('third_party_company_address')->nullable();
            $table->string('tpc_cp_name_1')->nullable();
            $table->string('tpc_cp_mobile_1')->nullable();
            $table->string('tpc_cp_name_2')->nullable();
            $table->string('tpc_cp_mobile_2')->nullable();


            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('employeedetails');
    }
}
