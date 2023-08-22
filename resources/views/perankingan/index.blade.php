@extends('layouts.app')

@section('content')
            <div class="page-header">
              <h3 class="page-title"> Data Kriteria </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <span>
                    <h4 class="card-title">Silahkan Lengkapi Nilai Bobot sesuai dengan prioritas yang Anda cari Terlebih Dahulu!</h4>
                    <h7>Berikan nilai bobot pada kriteria yang anda prioritaskan dengan nilai yang besar!</h7>
                    <h7>Setelah lengkap bisa klik button hitung untuk mendapatkan  hasil rekomendasi! </h7>
                  </span>
                  <hr>
                  
                  <form class="form-inline" action="{{ route('perankingan.store') }}" method="POST">
                        <div class="form-group">
                        {{csrf_field()}}
                        <label class="col-sm-4 form-label">Nama Kriteria</label>
                            <select class="form-control" name="id" id="id" required>
                            <option value="">Pilih Nama Kriteria</option>
                                @foreach($kriterias as $kriteria)
                                    <option value="{{$kriteria->id}}">{{$kriteria->nama_kriteria}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <label class="form-label">Bobot<br></label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('bobot') is invalid @enderror" name="bobot" value="{{ old('bobot') }}" id="bobot" placeholder="Masukkan Nilai Bobot" required>
                            @error('bobot')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>&emsp;
                        
                        <button type="submit" class="btn btn-primary btn-fw">Submit</button>
                    </form>
                    <br>
                    
                      <H5>Keterangan :</H5>
                      
                      1. Kemudahan Pengguna pada kriteria ini yakni kemudahan dalam penggunaan situs lowongan kerja
                      <br>2. Kemudahan Apply pada kriteria ini yakni kemudahan saat mengapply/melamar pekerjaan yang diinginkan pada situs lowongan kerja
                      <br>3. Detail Informasi pada kriteria ini yakni kelengkapan informasi yang diberikan situs lowongan kerja mengenai lowongan kerja yang disediakan
                      <br>4. Kecepatan Akses pada kriteria ini yakni kecepatan respon yang diberikan saat menggunakan/mengakses semua fitur pada situs lowongan kerja
                      <br>5. Keamanan pada kriteria ini yakni jaminan keamanan mengenai data anda dan penggunaan situs lowongan kerja 
                      <br>6. Jumlah pengguna situs pada kriteria ini yakni jumlah orang yang menggunakan situs lowongan kerja 
                      <br>7. Biaya pada kriteria ini yakni biaya penggunaan pada fitur-fitur yang disediakan oleh situs lowongan kerja
                    
                    
                    </div>
                    <div class="card-body">
                    <h1 class="card-title">Data Kriteria</h1>
                    <table class="table table-hover">
                    <thead>
                        <tr>
                          <th>NO</th>
                          <th>NAMA KRITERIA</th>
                          <th>KODE</th>
                          <th>BOBOT</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 0;?>
                        @forelse ($bobot as $kriteria)
                        <?php $no++ ;?>
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $kriteria->nama_kriteria }}</td>
                          <td>{{ $kriteria->kode }}</td>
                          <td>{{ $kriteria->bobot}}</td>
                          
                          @empty
                            Data belum Tersedia.
                        </tr>
                        @endforelse
                        </tbody>
                    </table>  
              </div>

              @if($countBobot == $countKriteria )
              @can('administrator')
              <span class="card-body d-lg-flex align-items-center">
                  <a href="/perankingancoba" class="btn btn-success"> Hitung </a></span>
              @endcan
              @can('user')
              <span class="card-body d-lg-flex align-items-center">
                  <a href="/hasil" class="btn btn-success"> Hitung </a></span>
              @endcan
              @endif
            </div>
          </div>  
@include('layouts.footer') 
@endsection
