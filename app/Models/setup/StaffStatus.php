<?php

namespace App\Models\setup;

use App\Models\Employee\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_status_name' , 'description'
    ];

    public function employee(){
        return $this->belongsToMany(Employee::class , '');
    }
}
