@extends('layouts.app')

@section('content')
<div class="page-header">
<h3 class="page-title"> Data Kriteria </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
                </ol>
              </nav>
            </div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Data Kriteria</h4>
        <p class="card-description"> Masukkan Data Kriteria </p>
            <form action="{{ route('datakriteria.update', $kriteria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label class="font-weight-bold">Nama Kriteria</label>
              <input type="text" name="nama_kriteria" class="form-control @error('nama_kriteria') is-invalid @enderror" id="nama_kriteria" value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}" placeholder="Masukkan Nama Kriteria">

              <!-- error message untuk nama -->
              @error('nama_kriteria')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Kriteria</label>
              <input type="text" name="kode" class="form-control @error('kriteria') is-invalid @enderror" id="kode" value="{{ old('koode', $kriteria->kode) }}" placeholder="Masukkan Kode Kriteria">

              <!-- error message untuk nama -->
              @error('kriteria')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="atribute" class="font-weight-bold">Atribute</label>
                    <select type="text" name="atribute" class="form-control @error('atribute') is-invalid @enderror" id="atribute" required>
                        <option>Benefit</option>
                        <option>Cost</option>
                    </select>
                @error('atribute')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary mr-2">Save</button>
            <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
            
            </form>
        </div>
    </div>
</div>
@endsection
