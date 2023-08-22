<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SPK || Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../css/style.css"> <!-- End layout styles -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
      
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
            <center><b><H4>SISTEM PENDUKUNG KEPUTUSAN
            <br>SITUS LOWONGAN KERJA</b></center></H4>
            <br>
              <div class="auth-form-light text-left p-5">
                <h4>Hello</h4>
                <h6 class="font-weight-light">Silahkan Login untuk melanjutkan</h6>
                <form class="pt-3" action="{{ route('login') }}" method="POST">
                  @csrf
                  <div class="form-group">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                    @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" tabindex="4">
                                Login
                            </button>
                  
                  <br>
                  <a href="{{('/panduan')}}"><div type="button" class="btn btn-block btn-inverse-info btn-lg font-weight-medium auth-form-btn" tabindex="4">
                                Panduan Penggunaan Sistem
                  </div></a>
                  <div class="text-center mt-4 font-weight-light"> Belum Punya Akun ? <a href="{{('/register')}}" class="text-primary">Buat Akun</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        
      </div>
      @include('layouts.footer')
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>