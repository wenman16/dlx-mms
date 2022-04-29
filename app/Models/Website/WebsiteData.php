<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebsiteData extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'isTheme',
        'isActive',
        'initVersion',
        'website_id',
        'updated_by',
        'deleted_by',
    ];

    public function website() {
        return $this->belongsTo('App\Models\Website\Website', 'website_id', 'id');
    }

}
