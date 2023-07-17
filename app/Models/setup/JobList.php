<?php

namespace App\Models\setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobList extends Model
{
    use HasFactory;

    protected $fillable  = [
        'job_title' , 'job_schedule' , 'job_category' , 'department' , 'starting_salary', 'description'
    ];

    


}
