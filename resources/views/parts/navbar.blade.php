
        <nav id="menu" class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                  <div class="navbar-header">
  
                      <!-- Collapsed Hamburger -->
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                          <span class="sr-only">Toggle Navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
  
                      <!-- Branding Image -->
                      <a href="#" class="pull-left"><img src="{!! asset('img/logo.png') !!}" style="width: 70px; height: 50px;"></a>
                  </div>
  
                  <div class="collapse navbar-collapse" id="app-navbar-collapse">
                      <!-- Left Side Of Navbar -->
                      <ul class="nav navbar-nav">
                          &nbsp;
                      </ul>
  
                      <!-- Right Side Of Navbar -->
                      <ul class="nav navbar-nav navbar-right">
                          <!-- Authentication Links -->
                          @guest
                              <li><a href="{{ route('login') }}">Login</a></li>
                              <li><a href="{{ route('register') }}">Register</a></li>
                          @else
                            @if(Auth::user()->is_admin)
                                <li><a href="/collages" class="page-scroll">Collages</a></li>
                              @else
                                  <li><a href="/collages" class="page-scroll">Collage</a></li>
                                  <li><a href="/documents" class="page-scroll">Documents</a></li>
                                  <li><a href="/comments" class="page-scroll">Comments</a></li>
                              @endif
                              <li>
                                  <a href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          @endguest
                      </ul>
                  </div>
              </div>
          </nav>

