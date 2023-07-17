<?php

namespace App\Models\setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_category_name',
        'description'
    ];
}
