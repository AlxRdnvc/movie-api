<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'director', 'imageUrl', 'duration', 'releaseDate', 'genre'];


    public static function searchMovie($title, $take, $skip)
    { 
        return Movie::when($title, function ($query) use ($title) {
            return $query->where('title', 'LIKE', '%'.$title.'%');
        })
        ->when($take, function($query) use($take) {
            return $query->take($take);
        })
        ->when($skip, function($query) use ($skip) {
            return $query->skip($skip);
        })
        ->get();
    }   
}