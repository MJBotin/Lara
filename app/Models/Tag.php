<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Allow mass assignment on the 'name' attribute
    protected $fillable = ['name'];

    // Define many-to-many relationship with Job (or JobListing) model
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_tag', 'tag_id', 'job_listing_id');
    }
}
