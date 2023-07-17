<?php

namespace App\Models\Employee;

use App\Models\setup\MaritalStatus;
use App\Models\setup\StaffStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    

    public function staff_status(){
        return $this->hasOne(StaffStatus::class , 'staff_status_id');
    }

    public function marital_status(){
        return $this->hasOne(MaritalStatus::class , 'marital_status_id');
    }
}
