<nav class="sidebar sidebar-offcanvas" id="sidebar">
          @can('administrator')
          <ul class="nav @if($title=='Home') active @endif">
            <li class="nav-item nav-profile">
              <a class="nav-link" href="#" >
                <div class="text-wrapper">
                  <p class="profile-name">Hallo,</p>
                  <p class="designation">{{ Auth::user()->name }}</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/home') }}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">DATA</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/datakriteria') }}">
                <span class="menu-title">Data Kriteria</span>
                <i class="icon-folder-alt menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/subkriteria') }}">
                <span class="menu-title">Data Keterangan Kriteria</span>
                <i class="icon-folder menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/alternatif') }}">
                <span class="menu-title">Data Alternatif</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">HASIL</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/perankingan') }}">
                <span class="menu-title">Hasil Rekomendasi</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/history') }}">
                <span class="menu-title">History Hasil</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">AUTH</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/user') }}">
                <span class="menu-title">Users</span>
                <i class="icon-user menu-icon"></i>
              </a>
            </li>
          </ul>
          @endcan
          @can('user')
          <ul class="nav @if($title=='Home User') active @endif">
          <li class="nav-item nav-profile">
              <a class="nav-link" href="#" >
                <div class="text-wrapper">
                  <p class="profile-name">Hallo,</p>
                  <p class="designation">{{ Auth::user()->name }}</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/home') }}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">DATA</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/datakriteriaku') }}">
                <span class="menu-title">Data Kriteria</span>
                <i class="icon-folder-alt menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/subkriteriaku') }}">
                <span class="menu-title">Data Keterangan Kriteria</span>
                <i class="icon-folder menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/alternatifku') }}">
                <span class="menu-title">Data Alternatif</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">HASIL</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ ('/perankingan') }}">
                <span class="menu-title">Hasil Rekomendasi</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
          </ul>
          @endcan
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
        </div>