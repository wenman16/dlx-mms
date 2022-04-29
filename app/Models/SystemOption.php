<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'option_name',
        'option_value',
        'updated_by',
        'deleted_by',
    ];
    
}
