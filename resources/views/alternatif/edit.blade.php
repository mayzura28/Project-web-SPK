@extends('layouts.app')

@section('content')
<div class="page-header">
<h3 class="page-title"> Data Alternatif </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Alternatif</A></li>
                </ol>
              </nav>
            </div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Data Alternatif</h4>
        <p class="card-description"> Masukkan Data Alternatif </p>
            <form action="{{ route('alternatif.update', $alternatif->id) }}" autocomplete="off" method="POST">
            @method('patch')
            @csrf
            <div class="form-group">
              <label class="font-weight-bold">ID</label>
              <input type="text" name="id" class="form-control @error('id') is-invalid @enderror" readonly id="id" value="{{ old('id', $alternatif->id) }}">

              <!-- error message untuk nama -->
              @error('id')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Nama Alternatif</label>
              <input type="text" name="nama_alt" class="form-control @error('nama_alt') is-invalid @enderror" id="nama_alt" value="{{ old('nama_alt', $alternatif->nama_alt) }}">

              <!-- error message untuk nama -->
              @error('nama_alt')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Kode</label>
              <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" readonly id="kode" value="{{ old('kode', $alternatif->kode) }}">

              <!-- error message untuk nama -->
              @error('kode')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            @foreach ($kriterias as $nilai)
                    <div class="form-group">
                        <h5 class="label-control">{{ $nilai->nama_kriteria }}</h5>
                        <select class="form-control @error('penggunaan') is invalid @enderror" name="kriteria[]"
                                data-minimum-results-for-search="-1" required>
                                <option selected>{{ $nilai->klasifikasi }}</option>
                                @foreach ($sub_kriterias as $sub_kriteria)
                                @if ($sub_kriteria->nama_kriteria == $nilai->nama_kriteria)
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
            <button type="submit" class="btn btn-primary mr-2">Save</button>
            <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
            
            </form>
        </div>
    </div>
</div>
@endsection
