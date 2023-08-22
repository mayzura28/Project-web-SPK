<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SPK | {{ $title }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('./vendors/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('./vendors/chartist/chartist.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('./css/style.css')}}">
    <!-- End layout styles -->
    <script src="https://kit.fontawesome.com/799ed0f7ee.js"></script>

</head>
<body>
<div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Selamat Datang di Halaman Panduan Penggunaan Sistem !</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
          <a href="{{('/panduan')}}"><button class="btn  btn-inverse-info btn-fw font-weight-medium auth-form-btn">
                                Panduan
            </button></a>
            &ensp;&ensp;
            <a href="{{('/login')}}"><button class="btn btn-primary btn-fw font-weight-medium auth-form-btn">
                                Login
            </button></a>
            </ul>
        </div>
      </nav>
      <div class="content-wrapper">
          <div class="container border-2 my-4 shadow-lg p-3 mb-5">
                <div class="card">
                    <div class="card-body">
                        <H3>Panduan Penggunaan Aplikasi</H3>
                        &ensp;
                        <h5>
                            <b>1. Melakukan Login Terlebih Dahulu</b>
                        </H5>
                        <p>- untuk memulai maka bisa melakukan login terlebih dahulu dengan memasukkan username dan password akun yang sudah terdaftar lalu klik button <b>Login</b>.
                            <br>Apabila belum memiliki akun maka dapat melakukan buat akun, dengan mengklik <b>Buat Akun</b>
                            <img src="./images/img/login2.jpg" width="100%" class="border border-primary">
                            <hr>
                        <p>- Setelah login maka anda berada di halaman dashboard
                            <img src="./images/img/dashboard.jpg" width="100%" class="border border-primary">
                            <hr>

                        <h5>
                            <b>2. Melihat Data Kriteria yang Disediakan</b>
                        </H5>
                        <p>- untuk melihat data kriteria, dapat mengklik pada menu <b>Data Kriteria</b> yang berada disebelah kiri.
                            <br> Data Kriteria disini yakni data kriteria penilaian yang digunakan dalam menilai Situs Lowongan Kerja terbaik.
                            <img src="./images/img/kriteria2.jpg" width="100%" class="border border-primary">
                            <hr>

                        <h5>
                            <b>3. Melihat Data Klasifikasi yang Disediakan</b>
                        </H5>
                        <p>- untuk melihat data klasifikasi, dapat mengklik pada menu <b>Data Klasifikasi</b> yang berada disebelah kiri.
                        <br> Data Klasifikasi disini yakni data klasifikasi dari kriteria penilaian yang digunakan dalam menilai Situs Lowongan Kerja terbaik.
                            <img src="./images/img/klasifikasi.jpg" width="100%" class="border border-primary">
                            <hr>
                        
                        <h5>
                            <b>4. Melihat Data Alternatif yang Disediakan</b>
                        </H5>
                        <p>- untuk melihat data ALTERNATIF, dapat mengklik pada menu <b>Data Alternatif</b> yang berada disebelah kiri.
                        <br> Data Alternatif disini yakni data Situs Lowongan Kerja yang disediakan beserta penilaian setiap kriteria yang ada.
                            <img src="./images/img/alternatif.jpg" width="100%" class="border border-primary">
                            <hr>

                        <h5>
                            <b>5. Mendapatkan Hasil Rekomendasi</b>
                        </H5>
                        <p>- untuk mendapatkan hasil rekomendasi, dapat mengklik pada menu <b>Hasil Rekomendasi</b> yang berada disebelah kiri.
                        <br>a. Step pertama yang dilakukan yakni anda dapat memilih kriteria terlebih dahulu lalu menginputkan nilai bobot pada kriteria berdasarkan kriteria yang diprioritaskan. Lakukan inputan secara berkala sampai semua kriteria lengkap terisi nilai bobot
                        <br>   Anda bisa memasukkan nilai tertinggi pada kriteria yang anda prioritaskan
                            <img src="./images/img/inputkriteria.jpg" width="100%" class="border border-primary">
                            <hr>
                        <br>b. Pastikan melengkapi setiap nilai bobot pada kriteria yang disediakan
                        <br>c. Setelah semua nilai bobot lengkap, akan muncul button <b>Hitung</b> pada bawah tabel, seperti contoh dibawah ini :
                        <br>   <b>CONTOH</b>
                            <img src="./images/img/contoh.jpg" width="100%" class="border border-primary">
                            <hr>
                        <br>d. Klik button <b>Hitung</b> yang berada dibawah tabel untuk melihat hasil rekomendasi situs lowongan kerja 
                            <img src="./images/img/hitung.jpg" width="100%" class="border border-primary">
                            <hr>
                        <br>e. Selanjutnya sistem akan Menampilkan hasil Rekomendasi Situs Lowongan Kerja Untuk Anda
                        <br>   <b>CONTOH</b> 
                            <img src="./images/img/hasil.jpg" width="100%" class="border border-primary">
                            <hr> 
                        <br> <b>ANDA JUGA DAPAT MENGUPDATE NILAI PADA KRITERIA DENGAN MENGULANGI TAHAP 5a</b>
                    </div>
                </div>

                
            </div>
            <footer class="footer">
                    <center>
                Copyright © SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN SITUS LOWONGAN KERJA 2023
                </footer>
          </div>
</body>