<?php

namespace App\Models\setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryGradeNotch extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'salary_type_code'
    ];

    public function salaryNotch(){
        return $this->hasMany(SalaryNotch::class);
    }

    public function salaryGrade(){
        return $this->hasMany(SalaryGrade::class);
    }
}
