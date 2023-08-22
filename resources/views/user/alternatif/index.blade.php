@extends('layouts.app')

@section('content')
            <div class="page-header">
              <h3 class="page-title"> Data Alternatif </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Alternatif</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Data Alternatif</h4>
                  </span>
                    <div class="card-body">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                          <th>NO</th>
                          <th>NAMA ALTERNATIF</th>
                          <th>ALTERNATIF</th>
                          <th>AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 0;?>
                        @forelse ($alternatif as $alternatifs)
                        <?php $no++ ;?>
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $alternatifs->nama_alt }}</td>
                          <td>{{ $alternatifs->kode}}</td>
                          <td>
                          <a href="/get_data/{{$alternatifs->id}}" class="btn btn-primary btn-sm my-1 mr-sm-1" role="button">LIHAT</a>  
                          </td>
                        </tr>
                        @empty
                            Data kriteria belum Tersedia.
                        @endforelse
                        </tbody>
                    </table> 
                  </div>
                </div>
              </div>
              @include('layouts.footer') 
@endsection
