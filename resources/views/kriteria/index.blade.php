@extends('layouts.app')

@section('content')
            <div class="page-header">
              <h3 class="page-title"> Data Kriteria </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Data Kriteria</h4>
                    <a href="{{route('datakriteria.create')}}" class="btn btn-outline-success btn-icon-text btn-sm my-1 my-sm-0 ml-auto">
                        <i class="icon-plus btn-icon-prepend"></i> Tambah Data </a>
                  </span>
                    <div class="card-body">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                          <th>NO</th>
                          <th>NAMA KRITERIA</th>
                          <th>KRITERIA</th>
                          <th>ATRIBUTE</th>
                          <th>AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 0;?>
                        @forelse ($kriterias as $kriteria)
                        <?php $no++ ;?>
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $kriteria->nama_kriteria }}</td>
                          <td>{{ $kriteria->kode }}</td>
                          <td>{{ $kriteria->atribute }}</td>
                          <td>
                          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('datakriteria.destroy', $kriteria->id) }}" method="POST">
                            <a href="{{ route('datakriteria.edit', $kriteria->id) }}" class="btn btn-success btn-sm my-1 mr-sm-1">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm my-1 mr-sm-1">HAPUS</button>
                          </form>
                            </td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

@endsection
