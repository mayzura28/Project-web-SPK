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
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Data Alternatif</h4>
        <p class="card-description"> Masukkan Data Alternatif </p>
            <form class="forms-sample" action="{{route('alternatif.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold">Nama Alternatif</label>
                    <input type="text" class="form-control @error('nama_alt') is invalid @enderror" name="nama_alt" value="{{ old('nama_alt') }}" id="nama_alt" placeholder="Masukkan nama Alternatif" required>
            @error('nama_alt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Kode</label>
                    <input type="text" class="form-control @error('kode') is invalid @enderror" name="kode" value="{{ old('kode') }}" id="kode" placeholder="Masukkan kode Alternatif" required>
            @error('kode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            @foreach($kriterias as $kriteria)
            <div class="form-group">
                <label class="font-weight-bold">{{ $kriteria->nama_kriteria}}</label>
                <select class="form-control @error('penggunaan') is invalid @enderror" name="kriteria[]"
                    data-minimum-results-for-search="-1" required>
                    <option value="">-- Pilih Kategori Surat --</option>
                    @foreach ($sub_kriterias as $sub_kriteria)
                    @if ($sub_kriteria->nama_kriteria == $kriteria->nama_kriteria)
                    <option value="{{ $sub_kriteria->nilai }}"> {{ $sub_kriteria->klasifikasi}}
                    </option>
                    @endif
                    @endforeach
                </select>
            @error('penggunaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            @endforeach
            <!-- <div class="form-group">
                <label class="font-weight-bold">Kemudahan Apply</label>
                <select class="form-control @error('apply') is invalid @enderror" name="kriteria[]"
                    data-minimum-results-for-search="-1" required>
                    @foreach ($sub_kriterias as $sub_kriteria)
                    @if ($sub_kriteria->nama_kriteria == 'Kemudahan Apply')
                    <option value="{{ $sub_kriteria->nilai }}"> {{ $sub_kriteria->klasifikasi}}
                    </option>
                    @endif
                    @endforeach
                </select>
            @error('apply')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Detail Informasi</label>
                <select class="form-control @error('informasi') is invalid @enderror" name="kriteria[]"
                    data-minimum-results-for-search="-1" required>
                    @foreach ($sub_kriterias as $sub_kriteria)
                    @if ($sub_kriteria->nama_kriteria == 'Detail Informasi')
                    <option value="{{ $sub_kriteria->nilai }}"> {{ $sub_kriteria->klasifikasi}}
                    </option>
                    @endif
                    @endforeach
                </select>
            @error('informasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Kecepatan Akses</label>
                <select class="form-control @error('Kecepatan Akses') is invalid @enderror" name="kriteria[]" data-minimum-results-for-search="-1" required>
                    @foreach ($sub_kriterias as $sub_kriteria)
                    @if ($sub_kriteria->nama_kriteria == 'Kecepatan Akses')
                    <option value="{{ $sub_kriteria->nilai }}"> {{ $sub_kriteria->klasifikasi}}
                    </option>
                    @endif
                    @endforeach
                </select>
            @error('akses')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Keamanan</label>
                <select class="form-control @error('keamanan') is invalid @enderror" name="kriteria[]"
                    data-minimum-results-for-search="-1" required>
                    @foreach ($sub_kriterias as $sub_kriteria)
                    @if ($sub_kriteria->nama_kriteria == 'Keamanan')
                    <option value="{{ $sub_kriteria->nilai }}"> {{ $sub_kriteria->klasifikasi}}
                    </option>
                    @endif
                    @endforeach
                </select>
                
            @error('keamanan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Jumlah Pengguna Situs</label>
                <select class="form-control @error('situs') is invalid @enderror" name="kriteria[]"
                    data-minimum-results-for-search="-1" required>
                    @foreach ($sub_kriterias as $sub_kriteria)
                    @if ($sub_kriteria->nama_kriteria == 'Jumlah Pengguna Situs')
                    <option value="{{ $sub_kriteria->nilai }}"> {{ $sub_kriteria->klasifikasi}}
                    </option>
                    @endif
                    @endforeach
                </select>
                
            @error('situs')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Biaya</label>
                <select class="form-control @error('biaya') is invalid @enderror" name="kriteria[]"
                    data-minimum-results-for-search="-1" required>
                    @foreach ($sub_kriterias as $sub_kriteria)
                        @if ($sub_kriteria->nama_kriteria == 'Biaya')
                        <option value="{{ $sub_kriteria->nilai }}"> {{ $sub_kriteria->klasifikasi}}
                        </option>
                        @endif
                    @endforeach
                </select>
                @error('biaya')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div> -->
            
            <button type="submit" class="btn btn-primary mr-2">Save</button>
            <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
            
            </form>
        </div>
    </div>
</div>
@endsection
