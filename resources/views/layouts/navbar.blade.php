<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark p-0 flex-md-nowrap">
        
          <a href="/dashboard" class="navbar-brand d-flex bg-dark align-items-center pr-3 pl-3">
            <i class="fas fa-book pr-3" style="color: white; font-size: 25px"></i>
            <strong>Common Place</strong>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                      <a class="nav-link" style="color: white" href="{{ url('/dashboard') }}">
                           {{ Auth::user()->name }}
                      </a>
                    </li>
                    <li class="nav-item dropdown mr-5">
                        <a id="navbarDropdown" class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-caret-square-down mt-2" style="color: white; font-size: 20px"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/account">
                                Account Details
                            </a>          
                            <div class="dropdown-divider"></div>              
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
</nav>


