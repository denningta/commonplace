@extends('layouts.master')

@section('content')

<form method="POST" action="{{ route('store') }}" name="card" id="card">
    {{ csrf_field() }}

<div class="row mb-3">
    <div class="col-sm-6 mr-0 pr-3">
        <label for="title">Card Title</label>
        <input name="title" type="text" class="form-control form-control-lg mb-3" autocomplete="off">     
    </div>

    <div class="col-sm-5" id="details">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Card Type: 
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">#</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" name="type" autocomplete="off">
                    

              </div>
            </li>
            <li class="list-group-item">Subject: 
                <input name="subject" type="text" class="form-control" autocomplete="off">
            </li>
            <li class="list-group-item">Book Title: 
                <input name="book_title" type="text" class="form-control" autocomplete="off">
            </li>
            <li class="list-group-item">Author: 
                <input name="book_author" type="text" class="form-control" autocomplete="off">
            </li>
            <li class="list-group-item">Page: 
                <input name="page" type="text" class="form-control" autocomplete="off">
            </li>
        </ul>
    </div>
</div>

<!-- Create the editor container -->
<input name="body" type="hidden">
<div id="editor-container" class="mb-3">
</div>

<script type="text/javascript" src="/js/quill_builder.js"></script>

@include('validate')

<div class="form-group mb-5 mr-2 mt-4">
    <button class="btn btn-sm btn-outline-primary mr-2" type="submit" form="card">
        <i class="fas fa-save"></i> Save
    </button>
    {{ csrf_field() }}
</div>

</div>
</form>

@endsection