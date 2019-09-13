@extends('layouts.master')

@section('content')


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Publisher</th>
      <th scope="col">Year</th>
      <th scope="col">Affiliate Link</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

@foreach( $books as $book)
    <tr>
      <th scope="row ">{{ $book->id }}</th>
      <td>{{ $book->title }}</td>
      <td>{{ $book->author }}</td>
      <td>{{ $book->publisher }}</td>
      <td>{{ $book->year }}</td>

      <td class="ml-auto">
        @if($book->affiliate_link == '' || $book->affiliate_image == '')
          <i class="fas fa-exclamation-triangle" style="color: red"></i>
        @else
          <i class="fas fa-check" style="color: green"></i>
        @endif
      </td>

       <td>
            <a class="btn btn-sm btn-outline-primary" href="/books/{{ $book->id }}">
                 <i class="fas fa-edit"></i>
            </a>
        </td>
    </tr>
@endforeach

  </tbody>
</table>


@endsection