<?php

namespace App\Models\setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryGrade extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'pay_grade' , 'pay_grade_code' ,'level' , 'no_of_notches' , 'notch_jump' , 'leave_days', 'salary_grade_notch_id','description'
    ];

    public function salaryGradeNotch(){
        return $this->belongsTo(SalaryGradeNotch::class);
    }

    public function salaryNotch(){
        $this->hasMany(SalaryNotch::class);
    }

    

}
