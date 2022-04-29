<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Version extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'website_data_id',
        'currentVersion',
        'updatedVersion',
        'updated_by',
        'deleted_by',
    ];

    public function websiteData() {
        return $this->belongsTo('App\Models\Website\WebsiteData', 'website_data_id', 'id');
    }
}
