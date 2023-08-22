@extends('layouts.app')

@section('content')
<div class="page-header">
              <h3 class="page-title"> Hasil </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Hasil</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body">
                    <h4 class="card-title">History Hasil</h4>
                  </span>
                    <div class="table-responsive border rounded p-1">
                    <table class="table table-hover">
                    <thead>
                      <tr align="center">
                          <th class="font-weight-bold">User</th>
                          <th class="font-weight-bold">Ranking</th>
                          <th class="font-weight-bold">Alternatifs</th>
                          <th class="font-weight-bold">Hasil Perhitungan</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($hasil as $hasils)
                          <tr align="center">
                              <td>{{ $hasils->name }}</td>
                              <td>{{ $hasils->ranking }}</td>
                              <td>{{ $hasils->nama }}</td>
                              <td>{{ $hasils->hasil }}</td>
                          </tr>
                          @endforeach
                  </tbody>
                    </table> 
                    <br> 
                </div>
              </div>
            </div>
@include('layouts.footer')
@endsection