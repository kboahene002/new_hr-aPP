<?php

namespace App\Http\Livewire\Employee;

use App\Models\Region;
use App\Models\setup\MaritalStatus;
use App\Models\setup\StaffStatus;
use Livewire\Component;

class Employee extends Component
{

    public $regions ;
    public $marital_status ;
    public $staff_status ;
    
    //input properties
    public $surname, $other_names , $staff_id_no , $ssn_number ,$gender , $country ,$dob , $marital_status_name 
    , $work_station , $staff_status_name , $division , $department , $job_title , $job_category , $first_app_date , $qualification
    ,$starting_salary , $monthly_salary , $postal_address , $city , $city_region , $home_town ,$phone_number , $email , $home_town_region ;

    public $rules = [
        'surname' => "required|string",
        'other_names' => "required|string",
        'staff_id_no' => "required",
        'ssn_number' => "required",
        'gender' => "required",
        'country' => "required",
        'dob' => "required",
        'marital_status_name' => "required",
        'work_station' => "required",
        'staff_status_name' => "required",
        'division' => "required",
        'department' => "required",
        'job_title' => "required",
        'job_category' => "required",
        'first_app_date' => "required",
        'qualification' => "required",
        'starting_salary' => "required",
        'monthly_salary' => "required|string",
        'postal_address' => "required|string",
        'city' => "required|string",
        'city_region' => "required|string",
        'home_town' => "required|string",
        'phone_number' => "required|digits:10",
        'email' => "required|email",
        'home_town_region' => "required",
    ];
    
    public function mount(){
       $this->regions =  Region::all();
       $this->marital_status = MaritalStatus::all();
       $this->staff_status = StaffStatus::all();
    }
    

    public function updated($field){
        $this->validateOnly($field);
    }

    public function storeEmployee(){
       dd('hello world'); 
    }



    public function render()
    {
        return view('livewire.employee.employee' );
    }
}
