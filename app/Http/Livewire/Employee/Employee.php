<?php

namespace App\Http\Livewire\Employee;

use App\Models\Region;
use App\Models\setup\MaritalStatus;
use App\Models\setup\QualificationType;
use App\Models\setup\StaffStatus;
use App\Models\WorkStation;
use Livewire\Component;

class Employee extends Component
{

    public $regions ;
    public $marital_status ;
    public $staff_status ;
    public $qualificationType;
    public $workStation;

    
    //input properties
    public $surname, $other_names , $staff_id_no , $ssn_number ,$gender , $country ,$dob , $marital_status_name 
    , $work_station , $staff_status_name , $division , $department , $job_title , $job_category , $first_app_date , $qualification
    ,$starting_salary , $monthly_salary , $postal_address , $city , $city_region , $home_town ,$phone_number , $email , $home_town_region ;

  
    
    public function mount(){
       $this->regions =  Region::all();
       $this->marital_status = MaritalStatus::all();
       $this->staff_status = StaffStatus::all();
       $this->qualificationType = QualificationType::all();
       $this->workStation = WorkStation::all();
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
