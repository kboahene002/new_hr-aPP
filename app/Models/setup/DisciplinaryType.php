<?php

namespace App\Models\setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaryType extends Model
{
    use HasFactory;

    protected $fillable = [
        'disciplinary_type' , 'description'
    ];
}
