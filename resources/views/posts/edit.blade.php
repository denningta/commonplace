@extends('layouts.master')

@section('content')

<form method="POST" action="{{ route('update', $post) }}" name="card" id="card">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

<div class="row mb-3">
    <div class="col-sm-6 mt-3 mr-0 pr-3">
        <input name="title" type="text" class="form-control form-control-lg mb-3" value="{{ $post->title }}">     
    </div>

    <div class="col-sm-5" id="details{{ $post->id }}">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Card Type: 
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">#</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Card Type" name="type" value="{{ $post->type }}" autocomplete="off">
              </div>
            </li>
            <li class="list-group-item">Subject: 
                <input name="subject" type="text" class="form-control" value="{{ $post->subject }}" autocomplete="off">
            </li>
            <li class="list-group-item">Book Title: 
                <input name="book_title" type="text" class="form-control" value="{{ $post->book_title }}" autocomplete="off">
            </li>
            <li class="list-group-item">Author: 
                <input name="book_author" type="text" class="form-control" value="{{ $post->book_author }}" autocomplete="off">
            </li>
            <li class="list-group-item">Page: 
                <input name="page" type="text" class="form-control" value="{{ $post->page }}" autocomplete="off">
            </li>
        </ul>
    </div>
</div>

<!-- Create the editor container -->
<input name="body" type="hidden">
<div id="editor-container" class="mb-3">
  {!! $post->body !!}
</div>
<script type="text/javascript" src="/js/quill_builder.js"></script>

@include('validate')

<div class="form-group mb-5 mr-2 mt-4">
    <button class="btn btn-sm btn-outline-primary mr-2" type="submit" form="card">
        <i class="fas fa-save"></i> Save
    </button>
    {{ csrf_field() }}
  
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
      <i class="fa fa-trash"></i> Delete
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Card</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this card?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-sm btn-outline-danger" href="{{route('delete', $post->id)}}?{{time()}}">
                <i class="fa fa-trash"></i> Delete
            </a>
          </div>
        </div>
      </div>
    </div>


</div>
</form>

@endsection