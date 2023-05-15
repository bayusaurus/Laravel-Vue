<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Movie extends Model
{
    use HasFactory, Searchable;
    
    protected $guarded = [];
    
    protected $table = "movies";

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
