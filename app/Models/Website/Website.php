<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Website extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'domain',
        'subdomain',
        'client_email',
        'updated_by',
        'deleted_by'
    ];

    // public function versions() {
    //     $this->hasMany('App\Models\Website\Version', 'website_data_id', 'id');
    // }
    
    // public function misc() {
    //     $this->hasMany('App\Models\Website\MiscellaneousMeta', 'website_data_id', 'id');
    // }

    public function websiteData() {
        return $this->hasOne('App\Models\Website\WebsiteData', 'website_id', 'id');
    }
    
}
