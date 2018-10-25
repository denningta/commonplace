@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-6 ml-5 mt-3 mr-0 pr-0">
        <h2>
            {{ $post->title }}
        </h2>
        <span>Created: {{ $post->created_at->toFormattedDateString() }}</span><br>
        <span>Last Updated: {{ $post->updated_at->toFormattedDateString() }}</span>

    </div>

    <div class="col-sm-5" id="details{{ $post->id }}">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Card Type: {{ ucwords($post->type) }}</li>
            <li class="list-group-item">Subject: {{ $post->subject }}</li>
            <li class="list-group-item">Book Title: {{ $post->book_title }}</li>
            <li class="list-group-item">Author: {{ $post->book_author }}</li>
            <li class="list-group-item">Page: {{ $post->page }}</li>
        </ul>
    </div>


    <div class="row">
        <div class="ql-snow col-sm m-3 pt-3 pb-3">
            <div id="editor-container" class="ql-editor">
                {!! $post->body !!}
            </div>
            
        </div>
    </div>
    <a class="btn btn-sm btn-outline-secondary mr-2 mb-5" href="/posts/{{ $post->id }}/edit">
      <i class="fas fa-edit"></i> Edit Card
    </a>
</div>
@endsection