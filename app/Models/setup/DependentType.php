<?php

namespace App\Models\setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DependentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'dependant_name' , 'description'
    ];
}
