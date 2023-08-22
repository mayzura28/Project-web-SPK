<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Selamat Datang di Halaman Dashboard !</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" data-toggle="dropdown" aria-expanded="false">
                <span class="dropdown-item-icon font-weight-normal"> {{ Auth::user()->role }} </span></a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a href="{{ route('logout') }}" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary" method="POST">@csrf</i>Log Out</a>
                </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>