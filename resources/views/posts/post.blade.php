<div class="blog-post">
  <div class="row">
    <div class="col-sm-11">
      <h2 class="blog-post-title">
        <a href="/posts/{{ $post->id }}" class="href">
        {{ $post->title }}
        </a>
      </h2>
    </div>
      <div class="col-sm">
        <a href="/posts/{{ $post->id }}/edit">
          <i class="fas fa-edit"></i>
        </a>
      </div>
  </div>
  <p class="blog-post-meta"> 
    {{ $post->created_at->toFormattedDateString() }}
  </p>
  <p>
    <a class="" data-toggle="collapse" href="#details{{ $post->id }}" role="button" aria-expanded="false" aria-controls="details{{ $post->id }}">
      <span data-feather="plus-circle"></span> Show Details
  </a>
  </p>
  <div class="collapse" id="details{{ $post->id }}">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Card Type: {{ $post->type }}</li>
      <li class="list-group-item">Subject: {{ $post->subject }}</li>
      <li class="list-group-item">Book Title: {{ $post->book_title }}</li>
      <li class="list-group-item">Author: {{ $post->book_author }}</li>
      <li class="list-group-item">Page: {{ $post->page }}</li>
    </ul>
  </div>

  <div class="mt-4 mb-2">
      {!! str_limit(strip_tags($post->body), $limit = 200, $end = '...') !!}

      <a href="/posts/{{ $post->id }}">Show More</a>
   
  </div>
</div><!-- /.blog-post -->