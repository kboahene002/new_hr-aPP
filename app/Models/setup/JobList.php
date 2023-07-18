<?php

namespace App\Models\setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobList extends Model
{
    use HasFactory;

    protected $fillable  = [
        'job_title' , 'job_schedule' , 'job_category_id' , 'department_id' , 'starting_salary_id', 'description'
    ];

    public function jobCategory(){
        return $this->belongsTo(JobCategories::class);
    }

    public function department(){
        return $this->belongsTo(DepartmentList::class);
    }

    public function notch(){
        return $this->belongsTo(SalaryNotch::class , 'starting_salary_id')  ;
    }
    


}
