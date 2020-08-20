<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function tracks()
    {
        return $this->hasMany(Track::class);
    }
}
