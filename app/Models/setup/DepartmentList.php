<?php

namespace App\Models\setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentList extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'departmentName' , 'divisionName','position', 'description'
    ];

   

          
}
