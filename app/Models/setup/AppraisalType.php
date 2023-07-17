<?php

namespace App\Models\setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppraisalType extends Model
{
    use HasFactory;

    protected $fillable = [
        'appaisal_type' , 'description'
    ];
}
