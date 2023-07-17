<?php

namespace App\Models\setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryNotch extends Model
{
    use HasFactory;

    protected $fillable = [
       'pay_grade' , 'notch_position', 'annual_salary' , 'notch_code','salary_grade_notch_id'
    ];

  

    public function salaryGradeNotch(){
        return $this->belongsTo(SalaryGradeNotch::class);
    }

    public function salaryGrade(){
        return $this->belongsTo(SalaryGrade::class);
    }



}
