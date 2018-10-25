<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    @if (in_array(Route::current()->getName(), ['post', 'update']))
      <h1 class="h2">Card</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary mr-2" href="/posts/{{ $post->id }}/edit">
          <i class="fas fa-edit"></i> Edit Card
        </a>
      </div>

    @elseif (in_array(Route::current()->getName(), ['edit']))
      <h1 class="h2">Edit</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <button class="btn btn-sm btn-outline-primary mr-2" type="submit" form="card">
          <i class="fas fa-save"></i> Save
        </button>
        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-trash"></i> Delete
        </button>
      </div>

    
    @elseif (in_array(Route::current()->getName(), ['create']))
      <h1 class="h2">Create Card</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>

    @elseif (in_array(Route::current()->getName(), ['account']))
      <h1 class="h2">Account Details</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
      
    @else
      <h1 class="h2">Dashboard</h1>

      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="dropdown mr-3">
          <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sort
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Newest</a>
            <a class="dropdown-item" href="#">Oldest</a>
          </div>
        </div>



        <div class="btn-group mr-2">
          <a href="/posts/create" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-plus-square"></i> Create Card
          </a>
        </div>
      </div>
    @endif


</div>