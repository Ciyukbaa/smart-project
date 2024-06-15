<div class="header">
        <div class="header-left">
          <a href="{{ URL::to('/') }}" class="logo">
            <img src="https://seeklogo.com/images/S/smarts-logo-8F737FF005-seeklogo.com.png" alt="Logo" />
          </a>
        </div>

        <div class="menu-toggle">
          <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
          </a>
        </div>

        <a class="mobile_btn" id="mobile_btn">
          <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
          <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list win-maximize">
              <img src="{{ URL::to('assets/img/icons/header-icon-04.svg') }}" alt="" />
            </a>
          </li>

          <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class=" nav-link">
              <span class="user-img">
                {{-- @dd(Auth::user()->image); --}}
                <img class="rounded-circle" src="{{ Auth::user()->image }}" width="31" />
                <div class="user-text">
                    <h6>{{ Auth::user()->name }}</h6>
                    <p class="text-muted mb-0">{{ Auth::user()->role }}</p>
                </div>
              </span>
            </a>
            {{-- <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{ Auth::user()->profile_image_url }}" alt="User Image" class="avatar-img rounded-circle" />
                    </div>
                    <div class="user-text">
                        <h6>{{ Auth::user()->name }}</h6>
                        <p class="text-muted mb-0">{{ Auth::user()->role }}</p>
                    </div>
                </div>
                <a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>
                <a class="dropdown-item" href="{{ route('inbox') }}">Inbox</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div> --}}
        </li>

        </ul>
      </div>