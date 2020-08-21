<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Artist extends Model
{
    protected $fillable = ['name'];

    public function setFirstNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(strtolower($value));
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }


}
