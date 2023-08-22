@extends('layouts.app')

@section('content')
<div class="page-header">
              <h3 class="page-title"> Perankingan </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Perankingan</li>
                </ol>
              </nav>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Bobot Preferensi</h4>
                  </span>
                  <div class="card-body">
                  <table class="table table-hover">
                  <thead>
                      <tr align="center">
                          <th>Kriteria</th>
                          @foreach (array_keys($bobotprefensi) as $indexKriteria)
                          <th>C{{ $indexKriteria }}</th>
                          @endforeach
                          <th>Total</th>
                      </tr>
                  </thead>

                  <tbody>
                            <tr align="center">
                              <td>Bobot Preferensi</td>
                              @foreach (array_keys($bobotprefensi) as $indexKriteria)
                              <td>{{ number_format((float)$bobotprefensi[$indexKriteria], 4, '.', '') }}
                              </td>
                              @endforeach
                              <td>{{ $bobot }}</td>
                          </tr>
                  </tbody></table>
                  </div>
                </div>
              </div>


              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Nilai Matriks keputusan</h4>
                  </span>
                  <div class="card-body">
                  <table class="table table-hover">
                  <thead>
                    <tr align="center">
                      <th>Kode</th>
                      @foreach (array_keys(current($matrix)) as $indexCriteria)
                      <th>C{{ $indexCriteria }}</th>
                      @endforeach
                    </tr>
                  </thead>

                  <tbody>
                    @foreach (array_keys($matrix) as $indexAlternatif)
                    <tr align="center">
                      <td>A{{ $indexAlternatif }}</td>
                      @foreach (array_keys($matrix[$indexAlternatif]) as $indexCriteria)
                      <td>{{ $matrix[$indexAlternatif][$indexCriteria] }}</td>
                      @endforeach
                      </tr>
                    @endforeach
                  </tbody></table>
                  </div>
                </div>
              </div>


              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Nilai Matriks Normalisasi</h4>
                  </span>
                  <div class="card-body">
                  <table class="table table-hover">
                  <thead>
                      <tr align="center">
                          <th>Kode</th>
                          @foreach (array_keys(current($matrix)) as $indexKriteria)
                          <th>C{{ $indexKriteria }}</th>
                          @endforeach
                      </tr>
                  </thead>

                  <tbody>
                      @foreach (array_keys($matrix) as $indexAlternatif)
                          <tr align="center">
                              <td>A{{ $indexAlternatif }}</td>
                              @foreach (array_keys($matrix[$indexAlternatif]) as $indexKriteria)
                              <td>{{ number_format((float)$normal[$indexAlternatif][$indexKriteria], 4, '.', '') }}
                              </td>
                              @endforeach
                          </tr>
                      @endforeach
                  </tbody></table>
                  </div>
                </div>
              </div>


              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Nilai Optimasi Objective</h4>
                  </span>
                  <div class="card-body">
                  <table class="table table-hover">
                  <thead>
                      <tr align="center">
                          <th>Kode</th>
                          @foreach (array_keys(current($normal)) as $indexKriteria)
                          <th>C{{ $indexKriteria }}</th>
                          @endforeach
                      </tr>
                  </thead>

                  <tbody>
                      @foreach (array_keys($normal) as $indexAlternatif)
                          <tr align="center">
                              <td>A{{ $indexAlternatif }}</td>
                              @foreach (array_keys($normal[$indexAlternatif]) as $indexKriteria)
                              <td>{{ number_format((float)$optim[$indexAlternatif][$indexKriteria], 4, '.', '') }}
                              </td>
                              @endforeach
                          </tr>
                      @endforeach
                  </tbody></table>
                  </div>
                </div>
              </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Nilai YI (Max - Min)</h4>
                  </span>
                  <div class="card-body">
                  <table class="table table-hover">
                  <thead>
                      <tr align="center">
                        <th>No</th>
                          <th>Nama Alternatif</th>
                          <th>Nilai YiMax</th>
                          <th>Nilai YiMin</th>
                          <th>Nilai Yi<br>Yi= Max-Min</th>
                      </tr>
                  </thead>

                  <tbody>
                    <?php $no = 0;?>                        
                    @foreach ($optim as $optimization_id => $val)
                    <?php $no++ ;?>
                     <tr align="center">
                        <td>{{ $no }}</td>
                        <td>{{ $alternatif[$optimization_id][0] }}</td>
                        <td>{{ number_format((float)$yimax[$optimization_id], 4, '.', '') }}</td>
                        <td>{{ number_format((float)$yimin[$optimization_id], 4, '.', '') }}</td>                                   
                        <td>{{ number_format((float)$yi[$optimization_id], 4, '.', '') }}
                    @endforeach
                      </tr>
                  </tbody>
                  </table>
                  </div>
                </div>
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
                </div>
                          </div>
              
          @include('layouts.footer')
@endsection