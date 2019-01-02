<!-- Navbar Area -->
        <div class="delicious-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                  <!-- Menu -->
                  <nav class="classy-navbar justify-content-between" id="deliciousNav">
                    <!-- Logo -->
                    <a class="nav-brand" href="{{ url('/') }}">
                      <img src="/img/core-img/logo.png" alt=""/>
                    </a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                      <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                      <!-- close btn -->
                      <div class="classycloseIcon">
                        <div class="cross-wrap">
                          <span class="top"></span>
                          <span class="bottom"></span>
                        </div>
                      </div>
   
                      <!-- Nav Start -->
                      <div class="classynav">
                        <ul>
                          <li><a href="/">Jaunumi</a></li>
                          <li><a href="/parmums">Par mums</a></li>
                          <li><a href="/raksti">Blogs</a></li>
                          <li><a href="/receptes">Receptes</a>
                           <li><a href="/kontakti">Kontakti</a></li>
                        </ul>

                        <!-- Newsletter Form -->
                        <div class="search-btn">
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </div>

                        <!-- Authentication Links -->
                        <ul>
                          @guest
                          <li><a href="{{ route('login') }}">
                            {{ __('Pierakstīties') }}
                          </a></li>
                          <li>
                            @if (Route::has('register'))
                              <a href="{{ route('register') }}">{{ __('Reģistrēties') }}</a>
                            @endif
                          </li>
                            @else  
                            <li style="width: 50px;" class="m-2">
                              <img src="/storage/profile_image/{{Auth::user()->profile_image}}" class="rounded-circle">
                            </li>

                            <li>
                              <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <ul class="dropdown">
                                <li><a href="/profils">
                                  Profils
                                </a></li>

                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  {{ __('Iziet') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    </form>
                                </a></li>
                              </ul>
                            </li> 
                          @endguest       
                        </ul>
                      </div>
                    </nav>
                  </div> 
                </div>
              </div>
              <!-- Nav End -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- ##### Header Area End ##### -->
