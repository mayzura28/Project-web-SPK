@extends('layouts.app')

@section('content')
            <div class="page-header">
              <h3 class="page-title"> Data Users </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Users</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Data Users</h4>
                  </span>
                    <div class="card-body">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                          <th>NO</th>
                          <th>USERNAME</th>
                          <th>EMAIL</th>
                          <th>ROLE</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 0;?>
                        @forelse ($users as $user)
                        <?php $no++ ;?>
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->role }}</td>
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
