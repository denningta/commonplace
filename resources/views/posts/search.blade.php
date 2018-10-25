
@extends ('layouts.master')

@section ('content')


@foreach($posts as $post)
  <div class="card p-3 m-2">
       @include('posts.post')
  </div>
@endforeach


@endsection

