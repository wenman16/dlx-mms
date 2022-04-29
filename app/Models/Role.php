<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'updated_by',
        'deleted_by',
    ];

    public function permissions() {
        return $this->hasMany('App\Models\Permission', 'role_id', 'id');
    }
    
}
