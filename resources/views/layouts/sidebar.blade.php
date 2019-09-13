<div class="container-fluid">
<div class="row">
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-tablet-alt"></i>
          Dashboard 
        </a>
        <a class="nav-link" href="/account">
          <i class="fas fa-user-circle"></i>
          Account 
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <div class="d-flex align-items-center text-muted" href="#">
              <span>Create New</span>
      </div>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="/posts/create">
          <i class="fas fa-plus-circle"></i>
          Note Card
        </a>
      </li>
    </ul>

{{-- Administrator Tools --}}
@if(Auth::user()->permissions == 1)
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <div class="d-flex align-items-center text-muted" href="#">
              <span>Administrator Tools</span>
      </div>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('bookIndex') }}">
          <i class="fas fa-link"></i>
          Affiliate Links
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('userPermissions') }}">
          <i class="fas fa-users"></i>
          User Permissions
        </a>
      </li>
    </ul>
@endif
{{-- End Administrator --}}

  </div>
</nav>