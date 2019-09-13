<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    public function book() 
    {
        return $this->belongsTo('App\Book');
    }

    public function scopeUserPosts($query)
    {
        $user_id = Auth::id();
        return $query->where('user_id', $user_id);
    }

    public function toSearchableArray()
    {
        $post = $this->toArray();

        $post = [
            'id' => $post['id'],
            'user_id' =>$post['user_id'],
            'title' => $post['title'],
            'type' => $post['type'],
            'body' => $post['body'],
            'book_title' => $this->book['title'],
            'book_author' => $this->book['author'],
            'publisher' => $this->book['publisher'],
        ];

        unset(
            $post['created_at'], 
            $post['updated_at']
        ); // Remove non-relevant data

        return $post;
    }

    public function searchableAs()
    {
        $algoliaIndex = config('algolia.index');
        return $algoliaIndex;
    }

    public static function validatePost() {
        request()->validate([
            'title' => 'required',
            'type' => 'required',
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
