<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    public function scopeUserPosts($query)
    {
        $user_id = Auth::id();
        return $query->where('user_id', $user_id);
    }

    public function searchableAs()
    {
        $algoliaIndex = 'posts';
        return $algoliaIndex;
    }

    public static function validatePost() {
        request()->validate([
            'title' => 'required',
            'type' => 'required',
            'subject' => 'required',
            'book_title' => 'required',
            'book_author' => 'required',
            'page' => 'required|integer',
            'body' => 'required'
        ]);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
}
