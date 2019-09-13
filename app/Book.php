<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use Searchable;

    public function searchableAs()
    {
        $algoliaIndex = config('algolia.index2');
        return $algoliaIndex;
    }

    public function posts() 
    {
        return $this->hasMany('App\Post');
    }
}
