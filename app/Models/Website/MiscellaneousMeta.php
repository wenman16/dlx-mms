<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MiscellaneousMeta extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'website_data_id',
        'meta_key',
        'meta_value',
        'updated_at',
        'deleted_at'
    ];

    public function websiteData() {
        return $this->belongsTo('App\Models\Website\WebsiteData', 'website_data_id', 'id');
    }
}
