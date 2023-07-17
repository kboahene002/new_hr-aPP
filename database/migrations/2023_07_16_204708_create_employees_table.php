<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            //Personal Information 
            $table->string('surname');
            $table->string('other_names');
            $table->string('staff_id')->unique();
            $table->string('ssn_number')->unique();
            $table->string('gender');
            $table->string('country');
            $table->string('d_o_b'); //date of birth
            $table->string('marital_status_id');
            $table->string('work_station');
            $table->string('staff_status_id');


            //Job Information 

            $table->string('division');
            $table->string('first_app_date');
            $table->string('department');
            $table->string('qualification');
            $table->string('job_title');
            $table->string('starting_salary');
            $table->string('job_category');
            $table->string('monthly_salary');

            //contact Information
            $table->string('postal_address');
            $table->string('residential_address');
            $table->string('city');
            $table->string('phone_number');
            $table->string('city_region');
            $table->string('email');
            $table->string('home_towm');
            $table->string('home_town_region');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
