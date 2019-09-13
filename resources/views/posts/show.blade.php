@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-6 ml-5 mt-3 mr-0 pr-0">
        <h2>
            {{ $post->title }}
        </h2>
        <span>Created: {{ $post->created_at->toFormattedDateString() }}</span><br>
        <span>Last Updated: {{ $post->updated_at->toFormattedDateString() }}</span>

    

        <div class="mt-2" id="details{{ $post->id }}">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    Book Title: 
                    <a target="_blank"  href="{{ $post->book->affiliate_link }}" >
                        {{ $post->book->title }}
                    </a>
                </li>
                <li class="list-group-item">Author: {{ $post->book->author }}</li>
                <li class="list-group-item">Page: {{ $post->page }}</li>
                <li class="list-group-item">Subject: {{ $post->subject }}</li>
                <li class="list-group-item">        
                    <a href="#" class="badge badge-primary">
                        {{ ucwords($post->type) }}
                    </a>
                </li>
            </ul>
        </div>

    </div>
    <div class="col-sm p-5">
        <a target="_blank"  href="{{ $post->book->affiliate_link }}" ></a><img src="{{ $post->book->affiliate_image }}" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
    </div>
</div>

    <div class="row mr-3 mt-0">
        <div class="ql-snow col-sm ml-3 pb-3">
            <div id="editor-container" class="ql-editor">
                {!! $post->body !!}
            </div>
            
        </div>
    </div>


    <div class="row">

        <a class="btn btn-sm btn-outline-secondary mr-2 mb-5 ml-3" href="/posts/{{ $post->id }}/edit">
          <i class="fas fa-edit"></i> Edit Card
        </a>
    </div>
@endsection