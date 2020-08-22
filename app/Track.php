<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Track extends Model
{
    protected $fillable = [
        'title', 'number'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function likedByUser()
    {
        return DB::table('track_user')
        ->select('id')
        ->where('user_id', auth()->user()->id)
        ->where('track_id' , $this->id)
        ->get()
        ->count();
    }
}
