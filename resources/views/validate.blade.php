@if ($errors->any())
    <div class=" col-4" role="alert">
      <ul class="list-group">
        @foreach ($errors->all() as $error)
          <li class="list-group-item list-group-item-danger">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif