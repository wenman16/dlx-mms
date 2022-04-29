<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'role_id',
        'capabilities', // could be an array or single data
        'updated_by',
        'deleted_by',
    ];

    public function role() {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }
}
