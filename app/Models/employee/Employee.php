<?php

namespace App\Models\Employee;

use App\Models\setup\MaritalStatus;
use App\Models\setup\StaffStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $fillable = [
        'surname' ,
            'other_names',
            'staff_id',
            'ssn_number',
            'gender',
            'country',
            'd_o_b',
            'marital_status_id',
            'work_station',
            'staff_status_id',
            'division',
            'department_id',
            'job_title_id',
            'job_category_id',
            'first_app_date',
            'qualification_id',
            'starting_salary_id',
            'monthly_salary',
            'postal_address',
            'city',
            'city_region',
            'home_towm',
            'phone_number',
            'email',
            'home_town_region',
            'avatar',
            'residential_address',
    ];


    public function staff_status(){
        return $this->hasOne(StaffStatus::class , 'staff_status_id');
    }

    public function marital_status(){
        return $this->hasOne(MaritalStatus::class , 'marital_status_id');
    }
}
