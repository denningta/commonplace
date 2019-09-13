@extends('layouts.master')

@section('content')

<form method="POST" action="{{ route('bookUpdate', $book) }}" name="books" id="books">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="book_title">Title</label>
            <input value="{{ $book->title }}"type="text" class="form-control" id="book_title" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="book_author">Author</label>
            <input value="{{ $book->author }}"type="text" class="form-control" id="book_author">
          </div>
          <div class="form-group">
            <label for="publisher">Publisher</label>
            <input value="{{ $book->publisher }}"type="text" class="form-control" id="publisher">
          </div>
          <div class="form-group">
            <label for="year">Year</label>
            <input value="{{ $book->year }}"type="text" class="form-control" id="year">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="affiliate_link">Affiliate URL</label>
            <textarea value="{{ $book->affiliate_link }}"type="text" class="form-control" id="affiliate_link" autocomplete="off"></textarea>
          </div>
          <div class="form-group">
            <label for="affiliate_image">Affiliate Image URL</label>
            <textarea value="{{ $book->affiliate_image }}"type="text" class="form-control" id="affiliate_image" autocomplete="off"></textarea>
          </div>

        </div>
    </div>            
    <button class="btn btn-sm btn-outline-primary mr-2" type="submit" form="books">
        <i class="fas fa-save"></i> Save Changes
    </button>
</form>


@endsection