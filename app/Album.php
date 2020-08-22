<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Album extends Model
{
    protected $fillable = ['title', 'year'];

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function likedByUser()
    {
        return DB::table('album_user')
        ->select('id')
        ->where('user_id', auth()->user()->id)
        ->where('album_id' , $this->id)
        ->get()
        ->count();
    }

    public function likes()
    {
        return DB::table('album_user')
        ->select('id')        
        ->where('album_id' , $this->id)
        ->get()
        ->count();
    }
}
