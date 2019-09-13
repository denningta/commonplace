@extends('layouts.master')

@section('content')

<form method="POST" action="{{ route('store') }}" name="card" id="card">
    {{ csrf_field() }}

<div class="row mb-3">
    <div class="col-sm-6 mt-3 mr-0 pr-3">
      <label for="title">Card Title:</label>
        <input name="title" type="text" class="form-control form-control-lg mb-3">     

      <ul class="list-group list-group-flush">
          <li class="list-group-item">Card Tags: 
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">#</div>
              </div>
              <input type="text" class="form-control" id="inlineFormInputGroup" name="type" autocomplete="off">
            </div>
          </li>
          <li class="list-group-item">Book:
              <div class="aa-input-container" id="aa-input-container">
                <input type="search" id="aa-search-input" class="form-control aa-input-search" placeholder="Search for books or add new..." name="search" autocomplete="off" />
            </div>
          </li>
          <li class="list-group-item">Page: 
              <input name="page" type="text" class="form-control" autocomplete="off">
          </li>
      </ul>
  </div>    
  <div class="col p-5">
    <a target="_blank"  href="https://www.amazon.com/gp/product/0060589469/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=0060589469&linkCode=as2&tag=stenology-20&linkId=8b6d6ceb935ce4a29999d0ad2941f099"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=US&ASIN=0060589469&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=stenology-20" ></a><img src="//ir-na.amazon-adsystem.com/e/ir?t=stenology-20&l=am2&o=1&a=0060589469" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
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

<script>
var client = algoliasearch('DQPIAH2MXB', 'a23d936bcc0e34f892c7560d941a7234');
var index = client.initIndex('posts');
index.setSettings({
  // searchableAttributes: [
  //   'book_title',
  //   'book_author',
  // ]
});
//initialize autocomplete on search input (ID selector must match)
autocomplete('#aa-search-input',
{ hint: false }, {
    source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
    //value to be displayed in input control after user's suggestion selection
    displayKey: 'name',
    //hash of templates used when rendering dataset
    templates: {
        //'suggestion' templating function used to render a single suggestion
        suggestion: function(suggestion) {
          return '<span>' +
            suggestion._highlightResult.book_title.value + '</span><span>' +
            suggestion._highlightResult.book_author.value + '</span>';
        }
    }
});
</script>


@endsection