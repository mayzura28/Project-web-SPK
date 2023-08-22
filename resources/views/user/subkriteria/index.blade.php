@extends('layouts.app')

@section('content')
            <div class="page-header">
              <h3 class="page-title"> Data Klasifikasi </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Klasifikasi</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Data Klasifikasi</h4>
                  </span>
                    <div class="card-body">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                          <th>NO</th>
                          <th>NAMA KRITERIA</th>
                          <th>KLASIFIKASI</th>
                          <th>NILAI</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 0;?>
                        @forelse ($sub_kriterias as $kriteria)
                        <?php $no++ ;?>
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $kriteria->nama_kriteria }}</td>
                          <td>{{ $kriteria->klasifikasi }}</td>
                          <td>{{ $kriteria->nilai }}</td>
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
