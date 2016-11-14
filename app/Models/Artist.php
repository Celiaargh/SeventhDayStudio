<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //
    protected $fillable = [
        'name', 'photo', 'description',
    ];

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}
