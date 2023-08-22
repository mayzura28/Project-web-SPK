@extends('layouts.app')

@section('content')
<div class="page-header">
              <h3 class="page-title"> Hasil Perankingan </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Hasil Perankingan</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Hasil Perankingan</h4>
                  </span>
                    <div class="card-body">
                    <table class="table table-hover">
                    <thead>
                      <tr align="center">
                          <th>Ranking</th>
                          <th>Alternatifs</th>
                          <th>Hasil Perhitungan</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($yi as $optimization_id => $val)
                          <tr align="center">
                              <td>{{ $rank++ }}</td>
                              <td>{{ $alternatif[$optimization_id][0] }}</td>
                              <td>{{ number_format((float)$yi[$optimization_id], 4, '.', '') }}</td>
                          </tr>
                          <?php
                             DB::table('hasils')->insert([
                              'user_id' => Auth::user()->id,
                              'ranking' => $rank-1,
                              'nama' => $alternatif[$optimization_id][0],
                              'hasil' => number_format((float)$yi[$optimization_id], 4, '.', ''),
                              'created_at' => now(),
                              'updated_at' => now()
                            ]);
                          ?>
                          @endforeach
                  </tbody>
                    </table>  
                  </div>
                  <div class="card-body">
                  <H5>Keterangan :</H5>
                  Hasil pada rekomendasi tersebut adalah urutan rekomendasi situs lowongan kerja terbaik yang direkomendasikan berdasarkan dengan kriteria prioritas yang ada tentukan.
                  <br>Berikut urutan rekomendasi dari kami untuk anda : <b>@foreach ($yi as $optimization_id => $val) {{ $alternatif[$optimization_id][0] }}, @endforeach</b>
                  </div>
                </div>
              </div>
            </div>
@include('layouts.footer')
@endsection