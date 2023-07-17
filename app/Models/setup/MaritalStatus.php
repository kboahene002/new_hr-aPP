<?php

namespace App\Models\setup;

use App\Models\Employee\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'description' , 'marital_status_name' ,'code'
    ];

    public function employee(){
        $this->belongsToMany(Employee::class);
    }
}
