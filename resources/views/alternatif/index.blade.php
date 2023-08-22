@extends('layouts.app')

@section('content')
            <div class="page-header">
              <h3 class="page-title"> Data Alternatif </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Alternatif</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Data Alternatif</h4>
                    <a href="{{route('alternatif.create')}}" class="btn btn-outline-success btn-icon-text btn-sm my-1 my-sm-0 ml-auto">
                        <i class="icon-plus btn-icon-prepend"></i> Tambah Data </a>
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
                          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('alternatif.destroy', $alternatifs->id) }}" method="POST">
                          <a href="/get_data/{{$alternatifs->id}}" class="btn btn-primary btn-sm my-1 mr-sm-1" role="button">LIHAT</a>  
                          <a href="{{ route('alternatif.edit', $alternatifs->id) }}" class="btn btn-success btn-sm my-1 mr-sm-1">EDIT</a>
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
    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

@endsection
