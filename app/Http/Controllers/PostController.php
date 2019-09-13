<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware('auth');

    }

    public function index(Request $request) 
    {
        $user_id = Auth::id();
        $algoliaIndex = config('algolia.index');
        $posts = Post::userPosts()->orderBy('created_at')->get();
        return view('posts.index', compact('posts', 'user_id', 'algoliaIndex'));
    }

    public function create() 
    {
        return view('posts.create', compact('posts'));
    }

    public function store() 
    {
        Post::validatePost();

        Post::create([
            'title' => request('title'),
            'type' => request('type'),
            'book_title' => request('book_title'),
            'book_author' => request('book_author'),
            'page' => request('page'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ])->searchable();

        return route('/dashboard');
    }

    public function show (Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit (Post $post)
    {

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) 
    {
        Post::validatePost();
        $updated_at = Carbon::now();

        $post = Post::find($id);
        Post::where('id', $id)->update($request->except(['_token', '_method']));
        Post::where('id', $id)->update([
            'updated_at' => $updated_at,
        ]);
        $post->save();
        return redirect('/posts/' . $id);
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/dashboard');
    }

    public function search(Request $request) 
    {
        $searchKey = $request->input('searchKey');
        $posts = Post::search($searchKey)->where('user_id', Auth::id())->get();
        return view('posts.search', compact('posts', 'searchKey'));
    }

    public function autocomplete(Request $request) 
    {
        $term = $request->term;
        $items = Post::userPosts()->where('title', 'LIKE', '%' . $term . '%')->get();
        if (count($items) == 0) {
            $searchResult[] =  'No item found';
        } else {
            foreach ($items as $key => $value) {
                $searchResult[] = $value->title;
            }
        }
        return $searchResult;
    }

}
