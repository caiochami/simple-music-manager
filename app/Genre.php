<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];
    
    public function tracks()
    {
        return $this->hasMany(Track::class);
    }
}
